<!doctype html>
<html lang="en">
  <head>
    @section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แผนที่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @endsection
  </head>
  @extends('layouts.nav')
  <body>
    @section('body')
    <h1> <br> <center>ปฏิทินกิจกรรมนักศึกษา</center></h1>
    <center><a href="add-map" class="btn btn-success">เพิ่มข้อมูล</a></center>
    <br>
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    แก้ไขข้อมูล
                </div>
                <div class="card-body">
                    <!--  -->
                    @if(Session::has('map_updated'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('map_updated')}}   
                    </div>
                    @endif
                    <form action="{{route('map.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value ="{{$maps->id}}">
                        <div class="from-group">
                            <label for="name">ชื่อรูปภาพ</label>
                            <input type="text" name="name" value ="{{$maps->name}}">
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="file">โปรดเลือกรูปภาพ</label>
                            <input type="file" name="file" onchange="previewFile(this)"><br>
                            <img src="{{asset('image/maps')}}/{{$maps->imgname}}" id="previewImg" class="img-fluid img-thumbnail" alt="Sheep"width="250" height="auto">
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