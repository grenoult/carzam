<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Car;
use Cache;
use Paginator;

class Cars extends Controller
{
  /**
   *  Get current Makes
   *  @return array List of unique makes
   */
  public function getMakes() {
    // Get from cache or update
    return Cache::remember('makes', 1440, function () {
        return Car::distinct()->select('make')->orderBy('make')->get();
    });
  }

  /**
   *  Get current cars Models
   *  @param string Vehicule make (manufacturer)
   *  @return array List of unique models per make
   */
  public function getModels($make) {
    // Get from cache or update
    return Cache::remember('models-'.$make, 1440, function () use ($make) {
      return Car::distinct()->select('model')->orderBy('model')->where('make', '=', $make)->get();
    });
  }

  /**
   *  Get current Badge
   *  @return array List of unique badges
   */
  public function getBadges() {
    // Get from cache or update
    return Cache::remember('badges', 1440, function () {
      return Car::distinct()->select('badge')->orderBy('badge')->get();
    });
  }

  /**
   *  Get current Variant
   *  @return array List of unique variants
   */
  public function getVariants() {
    // Get from cache or update
    return Cache::remember('variants', 1440, function () {
      return Car::distinct()->select('variant')->orderBy('variant')->get();
    });
  }

  /**
   *  Get current Colour
   *  @return array List of unique colours
   */
  public function getColours() {
    // Get from cache or update
    return Cache::remember('colors', 1440, function () {
      return Car::distinct()->select('color')->orderBy('color')->get();
    });
  }

  /**
   *  Search through DB using GET parameters
   *  @return array List of cars matching search
   */
  public function search() {
    // Store GET parameters in variables
    $make = isset($_GET['make']) ? $_GET['make'] : false;
    $model = isset($_GET['model']) ? $_GET['model'] : false;
    $badge = isset($_GET['badge']) ? $_GET['badge'] : false;
    $variant = isset($_GET['variant']) ? $_GET['variant'] : false;
    $color = isset($_GET['color']) ? $_GET['color'] : false;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Return cached records or from DB if no cache
    return Cache::remember('search-'.$make.'-'.$model.'-'.$badge.'-'.$variant.'-'.$color.'-'.$page, 60, function () use ($make, $model, $badge, $variant, $color) {
      // Select fields to return
      $car = Car::select('id', 'make', 'model', 'badge', 'variant', 'color');

      // Make filter
      if ($make !== false) {
        $car = $car->where('make',$make);
      }

      // Model filter
      if ($model !== false) {
        $car = $car->where('model',$model);
      }

      // Badge filter
      if ($badge !== false) {
        $car = $car->where('badge',$badge);
      }

      // Variant filter
      if ($variant !== false) {
        $car = $car->where('variant',$variant);
      }

      // Color filter
      if ($color !== false) {
        $car = $car->where('color',$color);
      }

      // Return paginated result
      return $car->paginate(20);
    });
  }
}
