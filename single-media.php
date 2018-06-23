<?php
//start buffer
ob_start();
//create new session
session_start();

//require database connection
require_once('conf/config.php');

//Title for HTML
$title = "single";

//redirect when not logged in
if ( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}

if(isset ($_GET['id']) ){
    $test = "WHERE media.media_id = {$_GET['id']}";
}

## Get Media ##
$media = "SELECT 
media.media_id,
media.title, 
media_type.type AS mediaType, 
media.image, 
media.reserved,
media.publish_date,
media.description,
media.isbn,
creator.first_name,
creator.last_name,
creator.type,
publisher.name AS publisher
FROM media
JOIN media_type ON media_type.type_id = media.fk_type
JOIN creator ON creator.creator_id = media.fk_creator
JOIN publisher ON publisher.publisher_id = media.fk_publisher

-- set filter
$test";

//Output Media
$mediaOut = mysqli_query($conn, $media);
?>

<!-- include <html> ... <body> -->
<?php include('inc/html_start.php'); ?>


<!-- Media List -->

   

<?php while ($row = mysqli_fetch_assoc($mediaOut)) { ?>
<section id="single-media">
    <div class="container">
        <a  href="home.php?publishers=" class="btn btn-lib back">back</a>
        <div class="row">
            <div class="col-md-6 col-lg-4 my-auto">
                <img src="<?php echo $row['image'] ?>" alt="Card Image" class="card-img-top"><br>
                <small>ISBN: <?php echo $row['isbn'] ?></small>
            </div>
            <div class="col-md-6 col-lg-6 my-auto">
                <h1><?php echo $row['title'] ?></h1>
                <p><?php echo $row['description'] ?></p>
                <hr>
                <table>
                    <tr>
                        <td><?php echo $row['type'] ?>:</td>
                        <td><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                    </tr>
                    <tr>
                        <td>published:</td>
                        <td><?php echo $row['publish_date'] ?> by <?php echo $row['publisher'] ?></td>
                    </tr>
                </table>
                <hr>
                This <?php echo $row['mediaType'] ?> is currently 
                <?php
                    if($row['reserved'] == 1){
                        echo "<span class='text-danger'>RESERVED</span>";
                    }else {
                        echo "<span class='text-success'>AVAILABLE</span>";
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>


<!-- include </body> ... </html> -->
<?php include('inc/html_end.php'); 
$conn->close();
ob_end_flush();
?>