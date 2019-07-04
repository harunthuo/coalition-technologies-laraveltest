<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Test</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Laravel Test</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
      
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="/">
                        <span data-feather="plus-circle"></span>
                        Products
                      </a>
                    </li>
                  </ul>
                </div>
            </nav>
      
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Product Entries</h1>
            </div>
            <div class="table-responsive">
                <div id="form-errors">
                    <div class="alert alert-danger" style="display:none"></div>
                </div>
                <div id="form-success">
                    <div class="alert alert-success" style="display:none"></div>
                </div>
                <form id="webpageForm" method="POST" action="/">
                    @csrf
                    <div class="form-group">
                        <label for="product-name">Product name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity in stock</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="price">Price per item</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    
                    <button type="submit" class="btn btn-primary save-form">Submit</button>
                </form>
                <br>
              <table class="table table-striped table-sm" id="product-table">
                <thead>
                  <tr>
                    <th>Product name</th>
                    <th>Quantity in stock</th>
                    <th>Price per item</th>
                    <th>Datetime submitted</th>
                    <th>Total value </th>
                    <th>Action </th>
                  </tr>
                </thead>
                <tbody>                        
                    @php
                    $jsonData = json_decode( $data, true );
                    @endphp 
                    @if ( count($jsonData) )
                      @foreach ($jsonData as $item)
                        <tr>
                          <td>{{ $item['product_name'] }}</td>
                          <td>{{ $item['quantity'] }}</td>
                          <td>{{ $item['price'] }}</td>
                          <td>{{ $item['created_at'] }}</td>
                          <td>{{ $item['quantity']*$item['price'] }}</td>
                          <td><a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></td>
                        </tr>
                      @endforeach                        
                    @endif   
                </tbody>
              </table>
            </div>
          </main>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/webpage.js') }}"></script>
    
    </script>
    
    <!-- Icons -->
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script>
        feather.replace()
    </script>