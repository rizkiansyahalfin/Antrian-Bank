<?php 
  session_start();
  if (!isset($_SESSION["loket_client"])) 
  {
    $_SESSION["loket_client"] = 0;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Antrian</title>
  <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../dashboard.css" rel="stylesheet">
</head>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Sistem Antrian</a>\
  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <div class="list-group panel">
          <a href="landingpage.php" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-dashboard"></i> <span class="hidden-sm-down">Beranda</span></a>
          <a href="../admin/admin.php" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-plus"></i> <span class="hidden-sm-down">Tambah Loket</span></a>
          <a href="../admin/laporan.php" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-university"></i> <span class="hidden-sm-down">Laporan</span></a>
          <a href="index.php" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-user-circle-o"></i> <span class="hidden-sm-down">Keluar</span></a>
        </div>
      </nav>
      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <div class="card text-center">
          <div class="card-header">Sitem Bank</div>
          <div class="card-body">
            <h4 class="card-title">Antrian Yang Sedang Berjalan</h4>
            <div class="row loket"></div>
            <div class="audio">
              <audio id="in" src="../audio/new/in.wav"></audio>
              <audio id="out" src="../audio/new/out.wav"></audio>
              <audio id="suarabel" src="../audio/new/Airport_Bell.mp3"></audio>
              <audio id="suarabelnomorurut" src="../audio/new/nomor-urut.MP3"></audio> 
              <audio id="suarabelsuarabelloket" src="../audio/new/konter.MP3"></audio> 
              <audio id="belas" src="../audio/new/belas.MP3"></audio> 
              <audio id="sebelas" src="../audio/new/sebelas.MP3"></audio> 
              <audio id="puluh" src="../audio/new/puluh.MP3"></audio> 
              <audio id="sepuluh" src="../audio/new/sepuluh.MP3"></audio> 
              <audio id="ratus" src="../audio/new/ratus.MP3"></audio> 
              <audio id="seratus" src="../audio/new/seratus.MP3"></audio> 
              <audio id="suarabelloket1" src="../audio/new/1.MP3"></audio> 
              <audio id="suarabelloket2" src="../audio/new/2.MP3"></audio> 
              <audio id="suarabelloket3" src="../audio/new/3.MP3"></audio> 
              <audio id="suarabelloket4" src="../audio/new/4.MP3"></audio> 
              <audio id="suarabelloket5" src="../audio/new/5.MP3"></audio> 
              <audio id="suarabelloket6" src="../audio/new/6.MP3"></audio> 
              <audio id="suarabelloket7" src="../audio/new/7.MP3"></audio> 
              <audio id="suarabelloket8" src="../audio/new/8.MP3"></audio> 
              <audio id="suarabelloket9" src="../audio/new/9.MP3"></audio> 
              <audio id="suarabelloket10" src="../audio/new/sepuluh.MP3"></audio> 
              <audio id="loket" src="../audio/new/loket.MP3"></audio> 
            </div>
          </div>
        </body>
        <script type="text/javascript">
          $("document").ready(function(){
            var tmp_loket=0;
            setInterval(function() {
              $.post("../apps/monitoring-daemon.php", function( data ){
                if(tmp_loket!=data['jumlah_loket']){
                  $(".col-md-3").remove();
                  tmp_loket=0;
                }
                  if (tmp_loket==0) {
                    for (var i = 1; i<= data['jumlah_loket']; i++) {
                      loket = '<div class="col-md-6">'+
                      '<center><div class="'+ i +
                      ' jumbotron" style="padding-top:20px;padding-bottom:20px;">'+
                      '<h1> '+data["init_counter"][i]+' </h1>'+
                      '<button class="btn btn-light btn-lg" type="button"><span class="fa fa-university">&nbsp;</span>LOKET '+ i +'</button>'+
                      '</div>'+
                      '</div>';
                      $(".loket").append(loket);
                    }
                    tmp_loket = data['jumlah_loket'];
                  }
                  for (var i = 1; i <= data['jumlah_loket']; i++) {
                    if (data["counter"]==i) {
                      $("."+i+" h1").html(data["next"]);
                    }
                  }
                  if (data["next"]) {
                    var angka = data["next"];
                    for (var i = 0 ; i < angka.toString().length; i++) {
                      $(".audio").append('<audio id="suarabel'+i+'" src="../audio/new/'+angka.toString().substr(i,1)+'.MP3" ></audio>');
                    };
                    mulai(data["next"],data["counter"]);
                  }else{
                    for (var i = 1; i <= data['jumlah_loket']; i++) {
                      if (data["counter"]==i) {
                        $("."+i+" h1").html(data["next"]);
                      }
                    }
                  };
                }, "json"); 
            }, 1000);
            //change
          });
          
  function mulai(urut, loket){
    var totalwaktu = 8568.163;
    document.getElementById('in').pause();
    document.getElementById('in').currentTime=0;
    document.getElementById('in').play();
    totalwaktu=document.getElementById('in').duration*1000; 
    setTimeout(function() {
        document.getElementById('suarabelnomorurut').pause();
        document.getElementById('suarabelnomorurut').currentTime=0;
        document.getElementById('suarabelnomorurut').play();
    }, totalwaktu);
    totalwaktu=totalwaktu+1000;
    if(urut<10){
      setTimeout(function() {
          document.getElementById('suarabel0').pause();
          document.getElementById('suarabel0').currentTime=0;
          document.getElementById('suarabel0').play();
        }, totalwaktu);
      totalwaktu=totalwaktu+1000;
      setTimeout(function() {
          document.getElementById('loket').pause();
          document.getElementById('loket').currentTime=0;
          document.getElementById('loket').play();
        }, totalwaktu);
      totalwaktu=totalwaktu+1000;
      setTimeout(function() {
          document.getElementById('suarabelloket'+loket+'').pause();
          document.getElementById('suarabelloket'+loket+'').currentTime=0;
          document.getElementById('suarabelloket'+loket+'').play();
        }, totalwaktu);
      totalwaktu=totalwaktu+1000;
      setTimeout(function() {
          for (var i = 0 ; i < urut.toString().length; i++) {
            $("#suarabel"+i+"").remove();
          };
        }, totalwaktu);
      totalwaktu=totalwaktu+1000;
    }else if(urut==10){
        setTimeout(function() {
            document.getElementById('sepuluh').pause();
            document.getElementById('sepuluh').currentTime=0;
            document.getElementById('sepuluh').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if(urut ==11){
        setTimeout(function() {
            document.getElementById('sebelas').pause();
            document.getElementById('sebelas').currentTime=0;
            document.getElementById('sebelas').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if(urut < 20){
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('belas').pause();
            document.getElementById('belas').currentTime=0;
            document.getElementById('belas').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if(urut < 100){
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('puluh').pause();
            document.getElementById('puluh').currentTime=0;
            document.getElementById('puluh').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if(urut==100){
      setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if (urut < 110) {
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if (urut == 110) {
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('sepuluh').pause();
            document.getElementById('sepuluh').currentTime=0;
            document.getElementById('sepuluh').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if (urut == 111) {
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('sebelas').pause();
            document.getElementById('sebelas').currentTime=0;
            document.getElementById('sebelas').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if (urut < 120) {
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel2').pause();
            document.getElementById('suarabel2').currentTime=0;
            document.getElementById('suarabel2').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('belas').pause();
            document.getElementById('belas').currentTime=0;
            document.getElementById('belas').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if (urut == 120) {
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('puluh').pause();
            document.getElementById('puluh').currentTime=0;
            document.getElementById('puluh').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if (urut < 200) {
        setTimeout(function() {
            document.getElementById('seratus').pause();
            document.getElementById('seratus').currentTime=0;
            document.getElementById('seratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabel1').pause();
            document.getElementById('suarabel1').currentTime=0;
            document.getElementById('suarabel1').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('puluh').pause();
            document.getElementById('puluh').currentTime=0;
            document.getElementById('puluh').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        
        if (urut%10!=0) {
          setTimeout(function() {
              document.getElementById('suarabel2').pause();
              document.getElementById('suarabel2').currentTime=0;
              document.getElementById('suarabel2').play();
            }, totalwaktu);
          totalwaktu=totalwaktu+1000;
        }

        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if (urut == 200) {
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('ratus').pause();
            document.getElementById('ratus').currentTime=0;
            document.getElementById('ratus').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }else if(urut < 999){
        setTimeout(function() {
            document.getElementById('suarabel0').pause();
            document.getElementById('suarabel0').currentTime=0;
            document.getElementById('suarabel0').play();
        }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        if (urut.toString().substr(1,1) == 0 && urut.toString().substr(2,1)==0) { // 200 300 400 ..
          setTimeout(function() {
              document.getElementById('ratus').pause();
              document.getElementById('ratus').currentTime=0;
              document.getElementById('ratus').play();
            }, totalwaktu);
          totalwaktu=totalwaktu+1000;
        } else if(urut.toString().substr(1,1) == 0 && urut.toString().substr(2,1)!=0){ // 201 304 405 506
          setTimeout(function() {
              document.getElementById('ratus').pause();
              document.getElementById('ratus').currentTime=0;
              document.getElementById('ratus').play();
            }, totalwaktu);
          totalwaktu=totalwaktu+1000;
          setTimeout(function() {
              document.getElementById('suarabel2').pause();
              document.getElementById('suarabel2').currentTime=0;
              document.getElementById('suarabel2').play();
            }, totalwaktu);
          totalwaktu=totalwaktu+1000;
        }else if(urut.toString().substr(1,1) != 0 && urut.toString().substr(2,1)==0){ //210 250 230
          if(urut.toString().substr(1,1) == 1){ //210
            setTimeout(function() {
              document.getElementById('ratus').pause();
              document.getElementById('ratus').currentTime=0;
              document.getElementById('ratus').play();
            }, totalwaktu);
            totalwaktu=totalwaktu+1000;
            setTimeout(function() {
              document.getElementById('sepuluh').pause();
              document.getElementById('sepuluh').currentTime=0;
              document.getElementById('sepuluh').play();
            }, totalwaktu);
            totalwaktu=totalwaktu+1000;
          }else{
            setTimeout(function() {
              document.getElementById('ratus').pause();
              document.getElementById('ratus').currentTime=0;
              document.getElementById('ratus').play();
            }, totalwaktu);
            totalwaktu=totalwaktu+1000;
            setTimeout(function() {
              document.getElementById('suarabel1').pause();
              document.getElementById('suarabel1').currentTime=0;
              document.getElementById('suarabel1').play();
            }, totalwaktu);
            totalwaktu=totalwaktu+1000;
            setTimeout(function() {
              document.getElementById('puluh').pause();
              document.getElementById('puluh').currentTime=0;
              document.getElementById('puluh').play();
            }, totalwaktu);
            totalwaktu=totalwaktu+1000;
          }
        }else if(urut.toString().substr(1,1) != 0 && urut.toString().substr(2,1)!=0){
          if (urut.toString().substr(1,1)==1) {
            if (urut.toString().substr(2,1)==1) { // 211 311 411 511
              setTimeout(function() {
                  document.getElementById('ratus').pause();
                  document.getElementById('ratus').currentTime=0;
                  document.getElementById('ratus').play();
                }, totalwaktu);
              totalwaktu=totalwaktu+1000;
              setTimeout(function() {
                  document.getElementById('sebelas').pause();
                  document.getElementById('sebelas').currentTime=0;
                  document.getElementById('sebelas').play();
                }, totalwaktu);
              totalwaktu=totalwaktu+1000;
            }else{ //212 215 219
              setTimeout(function() {
                  document.getElementById('ratus').pause();
                  document.getElementById('ratus').currentTime=0;
                  document.getElementById('ratus').play();
                }, totalwaktu);
              totalwaktu=totalwaktu+1000;
              setTimeout(function() {
                  document.getElementById('suarabel2').pause();
                  document.getElementById('suarabel2').currentTime=0;
                  document.getElementById('suarabel2').play();
                }, totalwaktu);
              totalwaktu=totalwaktu+1000;
              setTimeout(function() {
                  document.getElementById('belas').pause();
                  document.getElementById('belas').currentTime=0;
                  document.getElementById('belas').play();
                }, totalwaktu);
              totalwaktu=totalwaktu+1000;
            }
          }else{
            setTimeout(function() {
                document.getElementById('ratus').pause();
                document.getElementById('ratus').currentTime=0;
                document.getElementById('ratus').play();
              }, totalwaktu);
            totalwaktu=totalwaktu+1000;
            setTimeout(function() {
                document.getElementById('suarabel1').pause();
                document.getElementById('suarabel1').currentTime=0;
                document.getElementById('suarabel1').play();
              }, totalwaktu);
            totalwaktu=totalwaktu+1000;
            setTimeout(function() {
                document.getElementById('puluh').pause();
                document.getElementById('puluh').currentTime=0;
                document.getElementById('puluh').play();
              }, totalwaktu);
            totalwaktu=totalwaktu+1000;
            if (urut%10!=0) {
              setTimeout(function() {
                  document.getElementById('suarabel2').pause();
                  document.getElementById('suarabel2').currentTime=0;
                  document.getElementById('suarabel2').play();
                }, totalwaktu);
              totalwaktu=totalwaktu+1000;
            }
          }
        }

        setTimeout(function() {
            document.getElementById('loket').pause();
            document.getElementById('loket').currentTime=0;
            document.getElementById('loket').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            document.getElementById('suarabelloket'+loket+'').pause();
            document.getElementById('suarabelloket'+loket+'').currentTime=0;
            document.getElementById('suarabelloket'+loket+'').play();
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
        setTimeout(function() {
            for (var i = 0 ; i < urut.toString().length; i++) {
              $("#suarabel"+i+"").remove();
            };
          }, totalwaktu);
        totalwaktu=totalwaktu+1000;
    }

    setTimeout(function(){
      document.getElementById('out').pause();
      document.getElementById('out').currentTime=0;
      document.getElementById('out').play();
    }, totalwaktu);
    totalwaktu=totalwaktu+1000;
    setTimeout(function() {
      $.post("../apps/monitoring-daemon-result.php", { id : urut }, function(data){
        if (!data.status) {
          console.log(data.status);   
        }
      }, 'json');
    }, totalwaktu);
    totalwaktu=totalwaktu+1000;
  }
  </script>
<center><div class="container">
<div class="row">
  <div class="col-md-6">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Nasabah Antrian</h4>
          <a href="../client/index.php" class="btn btn-primary">Klik disini</a>
        </div>
      </div>
    </div>

<div class="col-md-6">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
          <h4 class="card-title">Admin Setting Antrian</h4>
          <a href="../admin/index.php" class="btn btn-primary">Klik disini</a>
        </div>
      </div>
    </div> 

</div>  
</div>
</center>

<br>



  <!--<div class="card-footer text-muted">
    Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2020
  </div>-->


</div>
</main>


  </body>
</html>
