  <!-- Blog Sidebar Widgets Column -->
  <div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h2>Chercher</h2>


    <form action="search.php" method="POST">
    <div class="input-group">
        <input type="text" class="form-control" name="search">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="btn_search">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>



<!-- login form -->
<div class="well">
<h2>Connexion</h2>

   <form action="includes/login.php" method="POST">
       <div class="form-group">
  <input type="text" class="form-control" placeholder="nom d'utilisateur" name="username">
       </div>

       <div class="input-group">
        <input type="password" class="form-control" name="password" placeholder="password">
        <span class="input-group-btn">
            <button class="btn btn-success" type="submit" name="btn-login">
                <span> s'identifier</span>
        </button>
        </span>

    </div>
   </form>
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h2>Categories</h2>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
            $query = "select * from categories";
                $result = mysqli_query($con,$query);
                while($row  = mysqli_fetch_assoc($result))
                {
                    $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<li> <a href='category.php?category={$cat_id};'>{$cat_title}</a>
                        </li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>


<!-- Side Widget Well -->
<div class="well">
    <h2>Etudiant.Com</h2>
    <p>sert de faciliter la communication entre les étudiants et l’université dans tous ce qui concerne les résumes des cours, les nouvelles de l’université etc. </p>
</div>

</div>

</div>
<!-- /.row -->