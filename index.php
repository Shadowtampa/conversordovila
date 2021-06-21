<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Conversor de Temperatura</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<style>
  .card {
    width: 25%;

    max-width: 20rem;
    display: inline-block;
    margin-left: 3rem;
    margin-top: 0.1rem;
    justify-content: center;
  }

  .form-group {
    margin-left: 3rem;
    margin-right: 3rem;
    max-width: 20rem;
    display: inline-block;
    margin-bottom: 3rem;
  }

  .footer {
    width: 101%;
    margin-bottom: -1%;
    margin-right: -1%;
    margin-left: -1%;
  }
</style>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand">Aula 04</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link">Conversor de temperatura
              <span class="visually-hidden">(current)</span>
            </a>

          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>

  <form action="index.php" method="post">
    <div class="form-group">
      <label for="temp" class="form-label mt-4">Temperatura</label>
      <input class="form-control" type="text" value=1 name="temp" id="temp">
    </div>
    <div class="form-group">
      <label class="form-label mt-4" for="origin">De:</label>
      <select class="form-select" name="origin" id="origin">
        <option value="0">Celsius (C)</option>
        <option value="1">Fahrenheit (F)</option>
        <option value="2">Kelvin (K)</option>
        <option value="3">Réaumur (Ré)</option>
        <option value="4">Rankine (Ra)</option>
        <option value="5">Luisius (Lu)</option>
      </select>
    </div>
    <div class="form-group">
      <label class="form-label mt-4" for="goal">Para:</label>
      <select class="form-select" name="goal" id="goal">
        <option value="0">Celsius (C)</option>
        <option value="1">Fahrenheit (F)</option>
        <option value="2">Kelvin (K)</option>
        <option value="3">Réaumur (Ré)</option>
        <option value="4">Rankine (Ra)</option>
        <option value="5">Luisius (Lu)</option>
      </select>
    </div>


    <div class="form-group">
      <label class="form-label mt-4" for="decimal_range">Casas Decimais:</label>
      <input class="form-control" type="text" value=2 name="decimal_range" id="decimal_range">
    </div>


    <input type="submit" value="Converter" class="btn btn-primary">

    <br>

    <?php
    $temperature_origin_type = $_POST["origin"];
    $temperature_goal_type = $_POST["goal"];
    $temperature = $_POST["temp"];

    $decimal_range = $_POST["decimal_range"];


    function get_formula($temperature_type_1, $temperature_type_2)
    {
      if ($temperature_type_1 == $temperature_type_2) {
        $convert_formula = function ($temperature) {
          return $temperature;
        };
      }
      if ($temperature_type_1 == 0) {
        if ($temperature_type_2 == 1) {
          $convert_formula = function ($temperature) {
            return $temperature * 9 / 5 + 32;
          };
        }
        if ($temperature_type_2 == 2) {
          $convert_formula = function ($temperature) {
            return $temperature + 273.15;
          };
        }
        if ($temperature_type_2 == 3) {
          $convert_formula = function ($temperature) {
            return $temperature * 4 / 5;
          };
        }
        if ($temperature_type_2 == 4) {
          $convert_formula = function ($temperature) {
            return $temperature * 9 / 5 + 491.67;
          };
        }
        if ($temperature_type_2 == 5) {
          $convert_formula = function ($temperature) {
            return ($temperature * 351) / 100 + 69;
          };
        }
      }
      if ($temperature_type_1 == 1) {
        if ($temperature_type_2 == 0) {
          $convert_formula = function ($temperature) {
            return ($temperature - 32) * 5 / 9;
          };
        }
        if ($temperature_type_2 == 2) {
          $convert_formula = function ($temperature) {
            return ($temperature - 32) * 5 / 9 + 273.15;
          };
        }
        if ($temperature_type_2 == 3) {
          $convert_formula = function ($temperature) {
            return $temperature;
          };
        }
        if ($temperature_type_2 == 4) {
          $convert_formula = function ($temperature) {
            return ($temperature - 32) * 4 / 9;
          };
        }
        if ($temperature_type_2 == 5) {
          $convert_formula = function ($temperature) {
            return ((($temperature - 69) * 20) / 39) + 32;
          };
        }
      }
      if ($temperature_type_1 == 2) {
        if ($temperature_type_2 == 0) {
          $convert_formula = function ($temperature) {
            return ($temperature - 273.15);
          };
        }
        if ($temperature_type_2 == 1) {
          $convert_formula = function ($temperature) {
            return ($temperature - 273.15) * 9 / 5 + 32;
          };
        }
        if ($temperature_type_2 == 3) {
          $convert_formula = function ($temperature) {
            return ($temperature - 273.15) * 4 / 5;
          };
        }
        if ($temperature_type_2 == 4) {
          $convert_formula = function ($temperature) {
            return $temperature * 1.8;
          };
        }
        if ($temperature_type_2 == 5) {
          $convert_formula = function ($temperature) {
            return ((($temperature - 69) * 100) / 351) + 273;
          };
        }
      }
      if ($temperature_type_1 == 3) {
        if ($temperature_type_2 == 0) {
          $convert_formula = function ($temperature) {
            return $temperature * 5 / 4;
          };
        }
        if ($temperature_type_2 == 1) {
          $convert_formula = function ($temperature) {
            return $temperature * 9 / 4 + 32;
          };
        }
        if ($temperature_type_2 == 2) {
          $convert_formula = function ($temperature) {
            return $temperature * 5 / 4 + 273.15;
          };
        }
        if ($temperature_type_2 == 4) {
          $convert_formula = function ($temperature) {
            return $temperature * 9 / 4 + 491.67;
          };
        }
        if ($temperature_type_2 == 5) {
          $convert_formula = function ($temperature) {
            return ($temperature * 69) * 80 / 351;
          };
        }
      }
      if ($temperature_type_1 == 4) {
        if ($temperature_type_2 == 0) {
          $convert_formula = function ($temperature) {
            return ($temperature - 491.67) * 5 / 9;
          };
        }
        if ($temperature_type_2 == 1) {
          $convert_formula = function ($temperature) {
            return $temperature - 459.67;
          };
        }
        if ($temperature_type_2 == 2) {
          $convert_formula = function ($temperature) {
            return $temperature * 5 / 9;
          };
        }
        if ($temperature_type_2 == 3) {
          $convert_formula = function ($temperature) {
            return ($temperature - 491.67) * 4 / 9;
          };
        }
        if ($temperature_type_2 == 5) {
          $convert_formula = function ($temperature) {
            return ($temperature - 69) * 20 / 39 + 491.67;
          };
        }
      }
      if ($temperature_type_1 == 5) {
        if ($temperature_type_2 == 0) {
          $convert_formula = function ($temperature) {
            return (($temperature - 69) * 100) / 351;
          };
        }
        if ($temperature_type_2 == 1) {
          $convert_formula = function ($temperature) {
            return ($temperature - 32) * 39 / 20 + 69;
          };
        }
        if ($temperature_type_2 == 2) {
          $convert_formula = function ($temperature) {
            return ($temperature - 273) * 351 / 100 + 69;
          };
        }
        if ($temperature_type_2 == 3) {
          $convert_formula = function ($temperature) {
            return ($temperature - 69) * 80 / 351;
          };
        }
        if ($temperature_type_2 == 4) {
          $convert_formula = function ($temperature) {
            return ($temperature - 491.67) * 39 / 20 + 69;
          };
        }
      }
      return $convert_formula;
    }

    function get_temperature_sufix_and_type($temperature_type)
    {
      if ($temperature_type == 0) {
        return ['°C', 'Celsius'];
      }
      if ($temperature_type == 1) {
        return ['°F', 'Farenheint'];
      }
      if ($temperature_type == 2) {
        return ['K', 'Kelvin'];
      }
      if ($temperature_type == 3) {
        return ['°Ré', 'Réaumur'];
      }
      if ($temperature_type == 4) {
        return ['°R', 'Rankine'];
      }
      if ($temperature_type == 5) {
        return ['°L', 'Luisius'];
      }
    }

    function set_card($temperature_origin_type, $temperature_goal_type, $temperature, $decimal_range)
    {
      [$origin_temperature_sufix, $origin_temperature_type]  = get_temperature_sufix_and_type($temperature_origin_type);
      [$goal_temperature_sufix, $goal_temperature_type]  = get_temperature_sufix_and_type($temperature_goal_type);
      $convert_formula = get_formula($temperature_origin_type, $temperature_goal_type);
      $converted_temperature = number_format($convert_formula($temperature), $decimal_range);
      $card = [$origin_temperature_type, $goal_temperature_type, $temperature, $origin_temperature_sufix, $converted_temperature, $goal_temperature_sufix];

      return $card;
    }

    function render_cards($card_list)
    {

      $bg = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
      $bg_counter = 0;


      foreach ($card_list as $card) {

        echo '<div class="card text-white bg-' . $bg[$bg_counter] . ' mb-3" >
        <div class="card-header">' . $card[0] . ' em ' . $card[1] . '</div>
        <div class="card-body">
           <h4 class="card-title">' . $card[2] . ' ' . $card[3] . '</h4>
           <h4 class="card-title">' . $card[4] . ' ' . $card[5] . '</h4>
        </div>
        </div>';
        if ($bg_counter == 0) {
          echo '<br>';
        }
        $bg_counter++;
      }
    }

    $card_answer = set_card($temperature_origin_type, $temperature_goal_type, $temperature, $decimal_range);
    $card_celsius = set_card($temperature_origin_type, 0, $temperature, $decimal_range);
    $card_farenheint = set_card($temperature_origin_type, 1, $temperature, $decimal_range);
    $card_kelvin = set_card($temperature_origin_type, 2, $temperature, $decimal_range);
    $card_reaumur = set_card($temperature_origin_type, 3, $temperature, $decimal_range);
    $card_rankine = set_card($temperature_origin_type, 4, $temperature, $decimal_range);
    $card_luisius = set_card($temperature_origin_type, 5, $temperature, $decimal_range);

    render_cards([$card_answer, $card_celsius, $card_farenheint, $card_kelvin, $card_reaumur, $card_rankine, $card_luisius]);
    ?>
  </form>
  <div class="footer">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand"> v1.05</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" >Shadowtampa
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/Shadowtampa/conversordovila/">Github</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://twitter.com/vilailus">Twitter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>