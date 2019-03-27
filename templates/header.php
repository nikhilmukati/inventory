

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="#">Inventary System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php"><i class="fa fa-home"></i>&nbsp;Home <span class="sr-only">(current)</span></a>
      <?php
        if(isset( $_SESSION["userid"]))
        {
          ?>
            <a class="nav-item nav-link active" href="logout.php"><i class="fa fa-user"></i>&nbsp;Logout</a>
        <?php
      }

      ?>
    

    </div>
  </div>
</nav>