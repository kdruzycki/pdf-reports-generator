<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../wzory/style.css" />
</head>
<h2 class="text-center"><title>Protokół prac pomontażowych</title></h2>
  <div class="card">
    <a class="card-link" data-toggle="collapse" href="#inwestor" aria-expanded="true">
      <h3 class="card-header" data-toggle="collapse">
        Dane inwestora i budowy
      </h3>
    </a>
    <div id="inwestor" class="collapse show" data-parent="form">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-sm-6">
            <div class="label"><label for="inwestor-imie">Imię</div>
            <input type="text" class="form-control" name="inwestor-imie" id="inwestor-imie" value="<?=$_POST['inwestor-imie']??''?>" />
          </div>
          <div class="form-group col-sm-6">
            <div class="label"><label for="inwestor-nazwisko">Nazwisko</div>
            <input type="text" class="form-control" name="inwestor-nazwisko" id="inwestor-nazwisko" value="<?=$_POST['inwestor-nazwisko']??''?>" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <div class="label"><label for="inwestor-telefon">Telefon</div>
            <input type="text" class="form-control" name="inwestor-telefon" id="inwestor-telefon" value="<?=$_POST['inwestor-telefon']??''?>" />
          </div>
          <div class="form-group col-sm-6">
            <div class="label"><label for="inwestor-email">E-mail</div>
            <input type="text" class="form-control" name="inwestor-email" id="inwestor-email" value="<?=$_POST['inwestor-email']??''?>" />
          </div>
        </div>
        <h4 class="h6">Adres inwestycji</h4>
        <div class="row">
          <div class="form-group col-sm-5">
            <div class="label"><label for="inwestor-ulica">Ulica i numer domu</div>
            <input type="text" class="form-control" name="inwestor-ulica" id="inwestor-ulica" value="<?=$_POST['inwestor-ulica']??''?>" />
          </div>
          <div class="form-group col-sm-3">
            <div class="label"><label for="inwestor-kod">Kod pocztowy</div>
            <input type="text" class="form-control" name="inwestor-kod" id="inwestor-kod" value="<?=$_POST['inwestor-kod']??''?>" />
          </div>
          <div class="form-group col-sm-4">
            <div class="label"><label for="inwestor-miasto">Miejscowość</div>
            <input type="text" class="form-control" name="inwestor-miasto" id="inwestor-miasto" value="<?=$_POST['inwestor-miasto']??''?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <a class="card-link" data-toggle="collapse" href="#kierownik">
      <h3 class="card-header">
        Dane kierownika budowy lub architekta
      </h3>
    </a>
    <div id="kierownik" class="collapse" data-parent="form">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-sm-6">
            <div class="label"><label for="kierownik-imie">Imię</div>
            <input type="text" class="form-control" name="kierownik-imie" id="kierownik-imie" value="<?=$_POST['kierownik-imie']??''?>" />
          </div>
          <div class="form-group col-sm-6">
            <div class="label"><label for="kierownik-nazwisko">Nazwisko</div>
            <input type="text" class="form-control" name="kierownik-nazwisko" id="kierownik-nazwisko" value="<?=$_POST['kierownik-nazwisko']??''?>" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <div class="label"><label for="kierownik-telefon">Telefon</div>
            <input type="text" class="form-control" name="kierownik-telefon" id="kierownik-telefon" value="<?=$_POST['kierownik-telefon']??''?>" />
          </div>
          <div class="form-group col-sm-6">
            <div class="label"><label for="kierownik-email">E-mail</div>
            <input type="text" class="form-control" name="kierownik-email" id="kierownik-email" value="<?=$_POST['kierownik-email']??''?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <a class="card-link" data-toggle="collapse" href="#montazysta">
      <h3 class="card-header">
        Dane kierownika prac montażowych
      </h3>
    </a>
    <div id="montazysta" class="collapse" data-parent="form">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-sm-6">
            <div class="label"><label for="montazysta-imie">Imię</div>
            <input type="text" class="form-control" name="montazysta-imie" id="montazysta-imie" value="<?=$_POST['montazysta-imie']??''?>" />
          </div>
          <div class="form-group col-sm-6">
            <div class="label"><label for="montazysta-nazwisko">Nazwisko</div>
            <input type="text" class="form-control" name="montazysta-nazwisko" id="montazysta-nazwisko" value="<?=$_POST['montazysta-nazwisko']??''?>" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <div class="label"><label for="montazysta-telefon">Telefon</div>
            <input type="text" class="form-control" name="montazysta-telefon" id="montazysta-telefon" value="<?=$_POST['montazysta-telefon']??''?>" />
          </div>
          <div class="form-group col-sm-6">
            <div class="label"><label for="montazysta-email">E-mail</div>
            <input type="text" class="form-control" name="montazysta-email" id="montazysta-email" value="<?=$_POST['montazysta-email']??''?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <a class="card-link" data-toggle="collapse" href="#usterki">
      <h3 class="card-header">
        Znalezione usterki 
      </h3>
    </a>
    <div id="usterki" class="collapse" data-parent="form">
      <div class="card-body">
        <?php $imgs = array_filter($_POST, function ($key) { return preg_match('@^img[0-9]+$@', $key); }, ARRAY_FILTER_USE_KEY); $i = count($imgs);?>
        <?php foreach($imgs as $key => $value): ?>
        <?php $id = substr($key, 3); ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group usterka" style="background-image: url('<?=$value?>')"></div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="label"><label>Numer AB</label></div>
              <input type="text" class="form-control" name="nr-ab<?=$id?>" value="<?=$_POST['nr-ab'.$id]?>" />
            </div>
            <div class="form-group">
              <div class="label"><label>Pozycja z AB</label></div>
              <input type="text" class="form-control" name="pozycja-ab<?=$id?>" value="<?=$_POST['pozycja-ab'.$id]?>" />
            </div>
            <div class="form-group">
              <div class="label"><label>Opis</label></div>
              <textarea class="form-control" name="opis<?=$id?>"><?=$_POST['opis'.$id]?>&nbsp;</textarea>
            </div>
          </div>
        </div>
        <?php if (--$i > 0) echo '<hr/>'; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  </div>
  <div class="card">
    <a class="card-link" data-toggle="collapse" href="#wykonawca">
      <h3 class="card-header">
        Wykonawca prac 
      </h3>
    </a>
    <div id="wykonawca" class="collapse" data-parent="form">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-sm-8">
            <div class="label"><label for="wykonawca-nazwa">Prace wykona</div>
            <input type="text" class="form-control" name="wykonawca-nazwa" id="wykonawca-nazwa" value="<?=$_POST['wykonawca-nazwa']??''?>" />
          </div>
          <div class="form-group col-sm-4">
            <div class="label"><label for="wykonawca-telefon">Telefon</div>
            <input type="text" class="form-control" name="wykonawca-telefon" id="wykonawca-telefon" value="<?=$_POST['wykonawca-nazwa']??''?>" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-4">
            <div class="label"><label for="naklad">Szacunkowy nakład pracy</div>
            <input type="text" class="form-control" name="naklad" id="naklad" value="<?php if (!empty($_POST['naklad'])) echo($_POST['naklad'].' godzin'); ?>">
          </div>
          <div class="form-group col-sm-4">
            <div class="label"><label for="dojazd">Dojazd</div>
            <input type="text" class="form-control" name="dojazd" id="dojazd" value="<?php if (!empty($_POST['dojazd'])) echo($_POST['dojazd'].' km'); ?>">
          </div>
          <div class="form-group col-sm-4">
            <div class="label"><label for="koszt">Szacunkowy koszt naprawy</div>
            <input type="text" class="form-control" name="koszt" id="koszt" value="<?php if (!empty($_POST['koszt'])) echo($_POST['koszt'].' PLN'); ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>