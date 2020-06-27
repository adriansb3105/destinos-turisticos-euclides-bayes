<?php

namespace App\Helpers\Algoritmo;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

/**
 * He solitado ayuda a Bryan Morales Sánchez, quién había llevado el curso unos años antes.
 * Su repositorio se encuentra en https://github.com/bryandms/euclidiana
 * Por lo tanto, este algoritmo fue construido con su ayuda.
 */
class NaiveBayes
{
  static protected $datos;
  static protected $cat;
  static protected $category;
  static protected $categories;
  static protected $instanceCategory;
  static protected $element;
  static protected $tableName;
  static protected $features = array();
  static protected $expiresAt;
  static protected $i;
  static protected $feature;

  public static function bayes($datos, $element)
  {
    self::$datos = $datos;
    self::$category = 'clase';
    self::$element = $element;
    self::$tableName = 'valores';
    self::$expiresAt = now()->addYear(1);

    NaiveBayes::cargarDatosCategoria();

    return NaiveBayes::clasificar();
  }

  /**
   * Calcula la probabilidad de cada clase, y lo multiplica por la probabilidad previa
   */
  public static function calcularProbabilidadTotal($probs, $instancesByCat, $m)
  {
    $probsClasses = array();

    foreach ($instancesByCat as $key => $instances) {
      $productFreq = 1;
      $n = self::$instanceCategory[$key];

      for ($i = 0; $i < count($probs) - 1; $i++) {
        $productFreq *= ($instances[$i] + $m * $probs[$i]) / ($n + $m);
      }

      $probsClasses[$key] = $productFreq * NaiveBayes::priorProbability($key);
    }

    return $probsClasses;
  }

  /**
   * Asigna el valor con la instancia o número de ocurrencias registrados
   */
  public static function cargarDatosCategoria()
  {
    $key = 'load_categoty_data_' . self::$tableName . '_' . self::$category;

    $query = Cache::remember($key, self::$expiresAt, function () {
      return DB::table(self::$tableName)
        ->select(self::$category, DB::raw('count(*) as total'))
        ->groupBy(self::$category)
        ->pluck('total', self::$category)->all();
    });

    [$categories] = array_divide($query);

    self::$instanceCategory = $query;
    self::$categories = $categories;
  }

  /**
   * Calcula la prioridad de la categoría
   */
  public static function priorProbability($category)
  {
    $key = 'prior_probability_' . self::$tableName . '_' . self::$category .
      '_' . $category;
    self::$cat = $category;

    return Cache::remember($key, self::$expiresAt, function () {
      $totalCategoryRecords = DB::table(self::$tableName)
        ->where(self::$category, self::$cat)
        ->count();
      $totalRecords = DB::table(self::$tableName)->count();

      return $totalCategoryRecords / $totalRecords;
    });
  }

  /**
   * Clasifica los elementos dados por el usuario para obtener su categoría
   */
  public static function clasificar()
  {
    $instancesByCat = array();
    $featuresProbs = NaiveBayes::calcularProbabilidad();

    foreach (self::$categories as $cat) {
      $instancesByCat[$cat] = NaiveBayes::instances($cat);
    }

    $m = count(self::$features) - 1;
    $totalProbsCategories = NaiveBayes::calcularProbabilidadTotal($featuresProbs, $instancesByCat, $m);

    return array_keys($totalProbsCategories, max($totalProbsCategories))[0];
  }

  /**
   * Calcula las probabilidades de un valor para cada de la categorías
   */
  public static function calcularProbabilidad()
  {
    $probs = array();

    foreach (self::$datos->first() as $feature => $value) {

      self::$feature = $feature;
      $key = 'calculate_probs_' . self::$tableName . '_' . $feature;

      $occurrFeature = Cache::remember($key, self::$expiresAt, function () {
        return DB::table(self::$tableName)
          ->select(self::$feature)
          ->distinct()
          ->get()->count();
      });

      array_push(self::$features, $feature);
      array_push($probs, 1 / $occurrFeature);
    }

    return $probs;
  }

  /**
   * Calcula el total de instancias que igualan el valor de la categoría
   */
  public static function instances($cat)
  {
    $instances = array();

    for ($i = 0; $i < count(self::$features) - 1; $i++) {

      $key = 'instances_' . self::$tableName . '_' . last(self::$features) .
        '_' . self::$features[$i] . '_' . self::$element[$i] . '_' . $cat;
      self::$cat = $cat;
      self::$i = $i;

      $instancesNumber = Cache::remember($key, self::$expiresAt, function () {
        return DB::table(self::$tableName)
          ->where([
            [self::$features[self::$i], self::$element[self::$i]],
            [last(self::$features), self::$cat],
          ])->get()->count();
      });

      array_push($instances, $instancesNumber);
    }

    return $instances;
  }
}
