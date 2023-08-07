<!doctype html>
<html lang="en">
  <head>
    @section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>กิจกรรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @endsection
  </head>
  @extends('layouts.nav')
  <body>
    @section('body')
    <h1> <br> <center>ปฏิทินกิจกรรมนักศึกษา</center></h1>
    <center><a href="add-location" class="btn btn-success">เพิ่มข้อมูล</a></center>
    <br>
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    แก้ไขข้อมูล
                </div>
                <div class="card-body">
                    <!--  -->
                    @if(Session::has('location_updated'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('location_updated')}}   
                    </div>
                    @endif
                    <form action="{{route('location.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value ="{{$location->id}}">
                        <div class="from-group">
                            <label for="num">หมายเลขอาคาร</label>
                            <input type="text" name="num" value ="{{$location->BNum}}">
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="name">ชื่ออาคาร</label>
                            <input type="text" name="name" value ="{{$location->BName}}">
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="lat">ละติจูด</label>
                            <input type="text" name="lat" value ="{{$location->Latitude}}">
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="long">ลองจิจูด</label>
                            <input type="text" name="long" value ="{{$location->Longitude}}">
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="des">คำอธิบาย</label>
                            <input type="text" name="des" value ="{{$location->Description}}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-light">แก้ไข</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    @endsection
  </body>
</html>