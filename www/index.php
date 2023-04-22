<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 
	<!--Script Link  put befor end of </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="../src/style.css">
    <script src="../src/main.js" defer></script>
    <title>The GYM </title>
</head>
<body>
    <section id="home">
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about-us">About us</a></li>
                <li><a href="#our-team">Our Team</a></li>
                <li><a href="#classes">Classes</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
            </ul>
        </nav>
        <div class="home-content">
            <h1 class="animeate">
                SHAPE YOUR BODY
                <a href="../Authentecation/login.php">Login</a>
            </h1>
        </div>
    </section>
    <section id="about-us">
        <div class="about-us-container">
            <div class="img animeate">
                the image
            </div>
            <div class="text animeate">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, at dicta itaque porro suscipit eveniet dignissimos numquam rerum omnis modi repellat harum? Magnam labore veniam autem, sed rerum ullam tempore natus ut eos dolorum voluptatem, ipsum eum odit dolor deleniti quod eius necessitatibus nisi. Eligendi officia quia, porro totam sequi rerum et non aliquam doloribus magnam pariatur temporibus assumenda dicta. Deserunt eaque vitae aut sit consequatur delectus dolorum illum et, repellendus exercitationem voluptatum totam voluptatibus. Rerum amet possimus laborum culpa quam incidunt nesciunt debitis accusamus soluta, commodi quidem dolore repellendus maiores dolor eius molestias inventore nam omnis perspiciatis? Deleniti eos ullam odit sed. Nobis pariatur eligendi fugiat ratione vero delectus ducimus, vitae aliquid molestiae similique neque dolorum voluptatibus laborum dolorem doloribus quos beatae sit non, omnis repellendus? Excepturi dicta earum aliquam et ad porro consequuntur tempore nam quos? Corrupti beatae dolor qui reiciendis voluptatem, iste id sequi libero. Rem, possimus accusantium? Voluptates, vero quis voluptatum voluptatibus consequatur ea ad nisi beatae, quaerat eligendi error hic? Veniam facilis, consectetur nemo sequi corporis odit explicabo error sint sunt atque hic maxime voluptate quis eum consequatur ipsum quo nam a quos, illo quisquam inventore vel. Autem est hic illo placeat odio incidunt exercitationem?
            </div>
        </div>
    </section>
    <section id="our-team">
        <center>
            <h3>OUR TEAM</h3>
            <h5>TRAIN WITH EXPERTS</h5>
        </center>
        <div class="our-team-container">
            <div class="team-member animeate">
                <img src="../src/Images/member1.jpg" alt="">
            </div>
            <div class="team-member animeate">
                <img src="../src/Images/member2.png" alt="">
            </div>
            <div class="team-member animeate">
                <img src="../src/Images/member3.png" alt="">
            </div>
        </div>
    </section>
    <section id="classes">
    <?php
        include("../db_login.php");
        
        $query = "SELECT * from classes";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<table border='3'>";
            echo "<tr>";
            echo "<th> ID </th>";
            echo "<th> Trainer </th>";
            echo "<th> Start Date</th>";
            echo "<th> Number of enrolment </th>";
            echo "<th> Max number of enrolment </th>";
            echo "</tr>";
            while ($result_row = mysqli_fetch_row($result)) {
                echo "<tr>";
                echo "<td>$result_row[0] </td>";
                echo "<td>$result_row[1] </td>";
                echo "<td> $result_row[2] </td>";
                echo "<td>$result_row[3] </td>";
                echo "<td>$result_row[4] </td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    ?>
    </section>
    <center>
        <section id="contact-us">
            <form style="width: 100vh;">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </section>
    </center>
    <footer>
        hi i am the footer
    </footer>
</body>
</html>