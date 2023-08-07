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
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    เพิ่มข้อมูล
                </div>
                <div class="card-body">
                    @if(Session::has('activity_added'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('activity_added')}}   
                    </div>
                    @endif
                    <form action="{{route('activity.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="from-group">
                            <label for="name">ชื่อรูปภาพ</label>
                            <input type="text" name="name">
                        </div>
                        <br>
                        <div class="from-group">
                            <label for="file">โปรดเลือกรูปภาพ</label>
                            <input type="file" name="file">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    @endsection
  </body>
</html>