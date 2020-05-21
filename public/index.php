<?php
require('auth.php');
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="ionicons.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});

function generuj(form) {
  var fd = new FormData(form);
  var xhr = new XMLHttpRequest();
  xhr.open('POST', form.getAttribute('action'));
  xhr.onload = function() {
    var msg = 'Błąd przy generowaniu pdf.';
    var ok = false;
    if (this.status == 200) {
      try {
        var resp = JSON.parse(this.response);
        if (resp.ok) {
          ok = true;
          document.querySelector('#pdf-link').setAttribute('value', resp.pdfUrl);
        } else
          msg = resp.message;
      } catch(e) {}
    };
    if (!ok) {
      document.querySelector('#pdf-link-modal .modal-body .error').innerHTML = msg;
      document.querySelectorAll('#pdf-link-modal .success').forEach((el) => {
        el.style.display = 'none';
      });
      document.querySelectorAll('#pdf-link-modal .error').forEach((el) => {
        el.style.display = 'block';
      });
    } else {
      document.querySelectorAll('#pdf-link-modal .error').forEach((el) => {
        el.style.display = 'none';
      });
      document.querySelectorAll('#pdf-link-modal .success').forEach((el) => {
        el.style.display = 'block';
      });
    }
    $('#pdf-link-modal').modal();
  };

  xhr.send(fd);
  return false;
}
function kopiuj() {
  var field = document.getElementById("pdf-link");
  field.select();
  field.setSelectionRange(0, 99999)
  document.execCommand("copy");
}
</script>
<title>Formularz</title>
</head>
<body class="container-lg py-3">
<h2 class="text-center">Protokół prac pomontażowych</h2>
<div class="modal fade" id="pdf-link-modal" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <span class="success">Twój plik jest gotowy!</span>
          <span class="error">Coś poszło nie tak!</span>
        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group success">
          <label for="pdf-link">Link do pliku</label>
          <div class="input-group">
            <input type="text" class="form-control" name="pdf-link" id="pdf-link" readonly="readonly" />
            <div class="input-group-append">
              <button class="btn btn-outline-dark" type="button" data-toggle="popover" data-content="Link skopiowany!" data-placement="top" onclick="kopiuj()">Kopiuj</button>
            </div>
          </div>
        </div>
        <div class="error">
        </div>
      </div>
    </div>
  </div>
</div>
<form method="post" action="./pdf.php?t=pomontazowe" autocomplete="off" onsubmit="return generuj(this);">
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
            <label for="inwestor-imie">Imię</label>
            <input type="text" class="form-control" name="inwestor-imie" id="inwestor-imie" />
          </div>
          <div class="form-group col-sm-6">
            <label for="inwestor-nazwisko">Nazwisko</label>
            <input type="text" class="form-control" name="inwestor-nazwisko" id="inwestor-nazwisko" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="inwestor-telefon">Telefon</label>
            <input type="text" class="form-control" name="inwestor-telefon" id="inwestor-telefon" />
          </div>
          <div class="form-group col-sm-6">
            <label for="inwestor-email">E-mail</label>
            <input type="text" class="form-control" name="inwestor-email" id="inwestor-email" />
          </div>
        </div>
        <h4 class="h6">Adres inwestycji</h4>
        <div class="row">
          <div class="form-group col-sm-5">
            <label for="inwestor-ulica">Ulica i numer domu</label>
            <input type="text" class="form-control" name="inwestor-ulica" id="inwestor-ulica" />
          </div>
          <div class="form-group col-sm-3">
            <label for="inwestor-kod">Kod pocztowy</label>
            <input type="text" class="form-control" name="inwestor-kod" id="inwestor-kod" />
          </div>
          <div class="form-group col-sm-4">
            <label for="inwestor-miasto">Miejscowość</label>
            <input type="text" class="form-control" name="inwestor-miasto" id="inwestor-miasto" />
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
            <label for="kierownik-imie">Imię</label>
            <input type="text" class="form-control" name="kierownik-imie" id="kierownik-imie" />
          </div>
          <div class="form-group col-sm-6">
            <label for="kierownik-nazwisko">Nazwisko</label>
            <input type="text" class="form-control" name="kierownik-nazwisko" id="kierownik-nazwisko" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="kierownik-telefon">Telefon</label>
            <input type="text" class="form-control" name="kierownik-telefon" id="kierownik-telefon" />
          </div>
          <div class="form-group col-sm-6">
            <label for="kierownik-email">E-mail</label>
            <input type="text" class="form-control" name="kierownik-email" id="kierownik-email" />
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
            <label for="montazysta-imie">Imię</label>
            <input type="text" class="form-control" name="montazysta-imie" id="montazysta-imie" />
          </div>
          <div class="form-group col-sm-6">
            <label for="montazysta-nazwisko">Nazwisko</label>
            <input type="text" class="form-control" name="montazysta-nazwisko" id="montazysta-nazwisko" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="montazysta-telefon">Telefon</label>
            <input type="text" class="form-control" name="montazysta-telefon" id="montazysta-telefon" />
          </div>
          <div class="form-group col-sm-6">
            <label for="montazysta-email">E-mail</label>
            <input type="text" class="form-control" name="montazysta-email" id="montazysta-email" />
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
        <div>
        </div>
        <div class="form-group">
          <label for="image">Wybierz zdjęcie</label>
          <div class="custom-file">
            <input type="file" name="image" id="image" class="form-control-file custom-file-input" onchange="handleUpload(this)" accept="image/*"/>
            <label class="custom-file-label" for="customFile">Dodaj zdjęcie...</label>
          </div>
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
            <label for="wykonawca-nazwa">Prace wykona</label>
            <input type="text" class="form-control" name="wykonawca-nazwa" id="wykonawca-nazwa" />
          </div>
          <div class="form-group col-sm-4">
            <label for="wykonawca-telefon">Telefon</label>
            <input type="text" class="form-control" name="wykonawca-telefon" id="wykonawca-telefon" />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-4">
            <label for="naklad">Szacunkowy nakład pracy</label>
            <div class="input-group">
              <input type="text" class="form-control" name="naklad" id="naklad">
              <div class="input-group-append">
                <span class="input-group-text">godzin</span>
              </div>
            </div>
          </div>
          <div class="form-group col-sm-4">
            <label for="dojazd">Dojazd</label>
            <div class="input-group">
              <input type="text" class="form-control" name="dojazd" id="dojazd">
              <div class="input-group-append">
                <span class="input-group-text">km</span>
              </div>
            </div>
          </div>
          <div class="form-group col-sm-4">
            <label for="koszt">Szacunkowy koszt naprawy</label>
            <div class="input-group">
              <input type="text" class="form-control" name="koszt" id="koszt">
              <div class="input-group-append">
                <span class="input-group-text">PLN</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr/>
    </div>
  </div>
  <div class="text-center mt-3">
    <input type="submit" value="Generuj" class="btn btn-outline-dark" />
  </div>
</form>
<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
<script>CFInstall.check({mode: 'overlay'});</script>
<![endif]-->
<script>
function handleUpload(e) {
  
  e.style.display = 'none';
  
  var usterki = document.querySelector('#usterki .card-body div');
  var progressbar = document.createElement('div');
  progressbar.setAttribute('class', 'progress');
  var bar = document.createElement('div');
  bar.setAttribute('class', 'progress-bar bg-danger');
  bar.setAttribute('role', 'progressbar');
  bar.setAttribute('aria-valuenow', '0');
  bar.setAttribute('aria-valuemin', '0');
  bar.setAttribute('aria-valuemax', '100');
  bar.style.width = '0';
  progressbar.appendChild(bar);
  usterki.appendChild(progressbar);
  
  var file = e.files[0];

  var fd = new FormData();
  fd.append("image", file);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'image_resizer.php');
 
  xhr.upload.onprogress = function(e) {
    if (e.lengthComputable) {
      var percent = Math.floor(e.loaded / e.total * 100) + "%";
      bar.style.width = percent;
      bar.innerHTML = percent;
    }
  };

  xhr.onload = function() {
    var ok = false;
    var msg = 'Serwer jest przeciążony lub plik jest zbyt duży.';
    if (this.status == 200) {
      try {
        var resp = JSON.parse(this.response);
        if (resp.ok) {
          ok = true;
          var image = document.createElement('img');
          image.src = resp.imageUrl;
          image.setAttribute('class', 'rounded mx-auto img-fluid');
          function r(progressbar) {
            progressbar.remove();
          };
          image.onload = r(progressbar);
          var timestamp = (new Date()).getTime();
          var row = document.createElement('div');
          row.setAttribute('class', 'row');
          usterki.appendChild(row);
          var group = document.createElement('div');
          group.setAttribute('class', 'form-group col-sm-6');
          row.appendChild(group);
          var label = document.createElement('label');
          label.setAttribute('for', 'nr-ab'+timestamp);
          label.appendChild(document.createTextNode('Numer AB'));
          var input = document.createElement('input');
          input.setAttribute('type', 'text');
          input.setAttribute('class', 'form-control');
          input.setAttribute('name', 'nr-ab'+timestamp);
          input.setAttribute('id', 'nr-ab'+timestamp);
          group.appendChild(label);
          group.appendChild(input);
          group = document.createElement('div');
          group.setAttribute('class', 'form-group col-sm-6');
          row.appendChild(group);
          label = document.createElement('label');
          label.setAttribute('for', 'pozycja-ab'+timestamp);
          label.appendChild(document.createTextNode('Pozycja z AB'));
          input = document.createElement('input');
          input.setAttribute('type', 'text');
          input.setAttribute('class', 'form-control');
          input.setAttribute('name', 'pozycja-ab'+timestamp);
          input.setAttribute('id', 'pozycja-ab'+timestamp);
          group.appendChild(label);
          group.appendChild(input);
          row = document.createElement('div');
          row.setAttribute('class', 'row');
          usterki.appendChild(row);
          group = document.createElement('div');
          group.setAttribute('class', 'form-group col-sm-6');
          row.appendChild(group);
          input = document.createElement('img');
          input.setAttribute('src', resp.imageUrl);
          input.setAttribute('class', 'rounded mx-auto img-fluid');
          group.appendChild(input);
          input = document.createElement('input');
          input.setAttribute('type', 'hidden');
          input.setAttribute('name', 'img'+timestamp);
          input.setAttribute('value', resp.imageUrl);
          group.appendChild(input);
          group = document.createElement('div');
          group.setAttribute('class', 'form-group col-sm-6');
          row.appendChild(group);
          label = document.createElement('label');
          label.setAttribute('for', 'opis'+timestamp);
          label.appendChild(document.createTextNode('Opis'));
          input = document.createElement('textarea');
          input.setAttribute('rows', '6');
          input.setAttribute('class', 'form-control');
          input.setAttribute('name', 'opis'+timestamp);
          input.setAttribute('id', 'opis'+timestamp);
          group.appendChild(label);
          group.appendChild(input);
          usterki.appendChild(document.createElement('hr'));
          
        } else
          msg = resp.message;
      } catch(e) {
        msg = 'Błąd komunikacji z serwerem.';
      }
    };
    if (!ok) {
      var div = document.createElement('div');
      div.setAttribute('class', 'alert alert-danger alert-dismissible');
      var close = document.createElement('button');
      close.setAttribute('class', 'close');
      close.dataset.dismiss = 'alert';
      close.innerHTML = '&times;';
      div.appendChild(close);
      div.appendChild(document.createTextNode(msg));
      progressbar.remove();
      usterki.appendChild(div);
    }
  };

  xhr.send(fd); 
  
  e.style.display = 'block';
}
</script>
</body>
</html>
