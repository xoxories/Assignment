<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("Destination ID not provided.");
}

$id = (int) $_GET['id']; // Cast to int for security

$result = mysqli_query($conn, "SELECT * FROM destinations WHERE id = $id");
$destination = mysqli_fetch_assoc($result);

if (!$destination) {
    die("Destination not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $destination['name']; ?> - TravelRec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand" href="index.php">TravelRec</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navmenu">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="destination.php" class="nav-link">Destination</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>

    </div>
</nav>

<!-- Content -->
<div class="container mt-5">
    <h2><?php echo $destination['name']; ?></h2>
    <p><strong>Location:</strong> <?php echo $destination['location']; ?></p>
    <p class="text-success"><strong>Price:</strong> RM <?php echo number_format($destination['price'], 2); ?></p>
    
    <img src="assets/image/<?php echo $destination['image']; ?>" class="img-fluid mb-4" alt="<?php echo $destination['name']; ?>">

    <p><?php echo nl2br($destination['description']); ?></p>

    <div class="alert alert-info mt-4">
        Experience the beauty and charm of <?php echo $destination['name']; ?>. Whether you're seeking adventure, relaxation, or cultural exploration, this destination offers unforgettable memories for every traveler.
    </div>

    <!-- Itinerary Planning Section -->
    <h4 class="mt-5 mb-3">Suggested Itinerary for <?php echo $destination['name']; ?></h4>

<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <h5 class="card-title mb-3">Detailed Plan:</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Day 1:</strong> Arrival at <?php echo $destination['location']; ?>, hotel check-in, welcome dinner, city sightseeing</li>
            <li class="list-group-item"><strong>Day 2:</strong> Full-day guided tour covering top attractions and hidden gems</li>
            <li class="list-group-item"><strong>Day 3:</strong> Leisure day with optional adventure activities or spa relaxation</li>
            <li class="list-group-item"><strong>Day 4:</strong> Cultural immersion: visit local markets, historical sites, and culinary experience</li>
            <li class="list-group-item"><strong>Day 5:</strong> Free time, shopping, and airport transfer for departure</li>
        </ul>
    </div>
</div>

<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <h5 class="card-title mb-3">Requirements:</h5>
        <ul>
            <li>Valid passport with minimum 6 months validity</li>
            <li>Travel insurance recommended</li>
            <li>Comfortable clothing and footwear</li>
            <li>Personal expenses for shopping or optional tours</li>
            <li>COVID-19 vaccination proof or travel requirements (if applicable)</li>
        </ul>
    </div>
</div>


    <!-- WhatsApp Booking Section -->
<div class="section-box text-center">
    <h5>Interested in Booking?</h5>
    <p>Contact us on WhatsApp for booking and inquiries:</p>
    <a href="https://wa.me/60182232614?text=Hi%20TravelRec,%20I'm%20interested%20in%20booking%20<?php echo urlencode($destination['name']); ?>" 
       target="_blank" 
       class="btn btn-success whatsapp-link">
        <img src="https://cdn-icons-png.flaticon.com/512/220/220236.png" alt="WhatsApp" style="width: 20px; margin-right: 5px;">
        Chat on WhatsApp
    </a>
</div>


    <!-- Back Button -->
    <a href="index.php" class="btn btn-secondary back-btn">Back to Home</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
