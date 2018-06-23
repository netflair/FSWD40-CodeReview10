<?php
//start buffer
ob_start();
//create new session
session_start();

//require database connection
require_once('conf/config.php');

//Title for HTML
$title = "Home";

//redirect when not logged in
if ( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}

## Get Publishers for Filter Dropdown ##
$publisher = "SELECT 
publisher.publisher_id, publisher.name
FROM publisher
";
//Out put Publishers
$publisherOut = mysqli_query($conn, $publisher);

//Save selected publisher value in $filter 
if(isset ($_GET['publishers']) ){
    $filter = "WHERE fk_publisher = $_GET[publishers]";
}
//reset filter to display all 
if ($_GET['publishers'] == ""){
    $filter = "";
}

## Get Media ##
$media = "SELECT 
media.media_id,
media.title, 
media_type.type, 
media.image, 
media.reserved
FROM media
JOIN media_type ON media_type.type_id = media.fk_type
-- set filter
$filter";

//Output Media
$mediaOut = mysqli_query($conn, $media);
?>

<!-- include <html> ... <body> -->
<?php include('inc/html_start.php'); ?>

<!-- Media Filter -->
<div class="container">
    <form id="filterform" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='get' name='form_filter' >
        <select id="publisherFilter" onchange="this.form.submit()" name="publishers" class="btn btn-lib">
            <option value="">Publishers (all)</option>
            <?php //Generate Option List
            while ($row = mysqli_fetch_assoc($publisherOut)){ ?>
                <option name="publisher" value="<?php echo $row['publisher_id'] ?>"><?php echo $row['name'] ?></option>
            <?php    
            }?>
        </select>
    </form>    
</div>
<script type="text/javascript">
    //assign name of last selected publisher to default option
    document.getElementById('publisherFilter').value = "<?php echo $_GET['publishers'];?>";
</script>

<!-- Media List -->
<section class="gallery-block cards-gallery">
    <div class="container">
        <div class="row">

            <?php 
            while ($row = mysqli_fetch_assoc($mediaOut)) { ?>

                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 transform-on-hover">
                        <div class="card-img">
                            <img src="<?php echo $row['image'] ?>" alt="Card Image" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h6><?php echo $row['title'] ?></h6>
                            <p class="text-muted card-text">
                                <?php
                                    if($row['reserved'] == 1){
                                        echo "<span class='text-danger'>RESERVED</span>";
                                    }else {
                                        echo "<span class='text-success'>AVAILABLE</span>";
                                    }
                                ?>
                            </p>
                            <form id="single" action='single-media.php' method='get' >
                                <button class="btn btn-lib" type="submit" name='id' value="<?=$row['media_id']?>"><a class="text-white" href="single-media.php?id=<?$row['media_id']?>">Show Media</a></button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</section>
<!-- include </body> ... </html> -->
<?php include('inc/html_end.php'); 
$conn->close();
ob_end_flush();
?>