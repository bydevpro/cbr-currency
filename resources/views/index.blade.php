<html>
  <head>
    <title>Курс валют ЦБ РФ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">  
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>
  <body>
    @include('header')
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <div class="flex-container" id="currency-data">
          
  @foreach($currencies as $row)
  <div class="currency">
   
        
     <h5 class="card-title"><span class="currency-charcode">{{ $row['currentCode'] }}</span></h5>
     <p class="card-text"><span class="currency-name">{{ $row['currentName'] }}</span></p>
     <div class="card-body">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><span class="currency-value">{{ $row['currentValue'] }} руб.</span></li>

  </ul>
</div>
  <div class="card-footer text-muted">
    {{$row['updated_at']}}
  </div>
</div>
  
  @endforeach
</div>
          </div>
        <div class="col-md-4">
         
          <form id='form-to-rub'>
            <!-- First currency conversion form -->
            <div class="form-group" >
              <h5>Конвертация в рубли</h5>
              <label for="amount1">Введите сумму:</label>
              <input type="number" class="form-control" id="amount1">
            </div>
            <div class="form-group" id="currency-form-1">
              <label for="currency1">Выберете валюту:</label>
              <select class="form-control" id="currency1">
              @foreach($currencies as $row)
                <option value="{{ $row['currentValue'] }}" id="currency-select">{{ $row['currentCode'] }}</option>
                @endforeach
                
              </select>
            </div>
            <div class="form-group">
              <label for="result1">В рублях:</label>
              <input type="text" class="form-control" id="result1" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Convert</button>
          </form>
          <form id='form-to-valute'>
            <!-- First currency conversion form -->
            <div class="form-group">
              <h5>Конвертация в Валюту</h5>
              <label for="amount2">Введите сумму:</label>
              <input type="number" class="form-control" id="amount2">
            </div>
            <div class="form-group" id="currency-form-2">
              <label for="currency2">Выберете валюту:</label>
              <select class="form-control" id="currency2">
              @foreach($currencies as $row)
                <option value="{{ $row['currentValue'] }}" id="currency-select">{{ $row['currentCode'] }}</option>
                @endforeach
                
              </select>
            </div>
            <div class="form-group">
              <label for="result2">В валюте:</label>
              <input type="text" class="form-control" id="result2" disabled>
            </div>
            <button type="submit2" class="btn btn-primary">Convert</button>
          </form>
</div>
          <script src="../js/calculate.js"></script> 
          <script src="../js/calculate_from.js"></script> 
          <script type="text/javascript" src="../js/refresh_data.js"></script>