<!doctype html>
<html lang="en">
  <head>
    @section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>อาคารสถานที่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @endsection
  </head>
  @extends('layouts.nav')
  <body>
    @section('body')
    <br>
    <h1><center>อาคารสถานที่</center></h1>
    <center><a href="add-location" class="btn btn-success">เพิ่มข้อมูล</a></center>
    <br>
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    ข้อมูลทั้งหมด
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">  
                                <thead>
                                    <tr>
                                        <th scope="col">หมายเลขอาคาร</th>
                                        <th scope="col">ชื่ออาคาร</th>
                                        <th scope="col">ละติจูด</th>
                                        <th scope="col">ลองจิจูด</th>
                                        <th scope="col">คำอธิบาย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($location as $locations)
                                    <tr>
                                        <th scope="row">{{$locations->BNum}}</th>
                                        <th scope="row">{{$locations->BName}}</th>
                                        <th scope="row">{{$locations->Latitude}}</th>
                                        <th scope="row">{{$locations->Longitude}}</th>
                                        <th scope="row">{{$locations->Description}}</th>
                                        <td><a href="edit-location/{{$locations->id}}" Class="btn btn-warning">Edit</a>
                                            <a href="delete-location/{{$locations->id}}" Class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    @endsection
  </body>
</html>