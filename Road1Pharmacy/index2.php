<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Road 1 Pharmacy</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Optional Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="frontpage-background">
    <div class="frontpage-container">
        <nav class="nav-bar navbar navbar-expand-md navbar-dark" style="position:fixed">
            <div class="container-fluid">
                <div class="title">
                    <img src="img/IMG_5789__1_-removebg-preview.png" class="logo-image-navbar h1" alt="logo">
                    <h1 class="frontpage-h1">Road 1 Pharmacy</h1>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-dropdown mr-auto" style="position:fixed">
                        <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Medicines</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>-->
                        <a class="nav-link" onclick="medicineDisplay()">Medicines</a>


                        <li class="nav-item ">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#About">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq">FAQ</a>
                        </li>
                    </ul>
                    <!--<ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex ">
                        <li class="nav-item navbar-button px-2">
                            <a class="darkblue-button " href="login.php">Login</a>
                        </li>
                        <li class="nav-item navbar-button px-2">
                            <a class="darkblue-button " href="register.php">Register</a>
                        </li>
                    </ul>-->
                </div>
            </div>
        </nav>
        <div class="container-fluid" style="display: none;" id="med_list" >
            <?php include 'med_list.php'; ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            function medicineDisplay() {
                var med_list = document.getElementById("med_list");
                var displayValue = med_list.style.display;

                if (displayValue === "block") {
                    med_list.style.display = "none";
                } else {
                    med_list.style.display = "block";
                    loadMedList(1); // Load the first page by default when showing the list
                }
            }

            function loadMedList(page) {
                $.ajax({
                    url: 'med_list.php',
                    type: 'GET',
                    data: {
                        page: page
                    },
                    success: function(response) {
                        $('#med_list').html(response);
                    }
                });
            }

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('data-page');
                loadMedList(page);
            }); 
        </script>


        <div class="frontpage-section">
            <div class="section-1">
                <h2 class="quote">Your One Stop <br> Healthcare <br> Pharmacy</h2>
                <!--<div class="section-button">
                    <a class="darkblue-button sec-button">About Us</a>
                </div> -->
            </div>
            <div class="section-2">
                <img class="section-image" src="https://hcmpharmacy.pharmabest.ca/wp-content/uploads/2022/12/toronto-pharmacy.png" alt="">
            </div>
        </div>
        <div class="trending-topics">
            <h5 class="topics">Trending Topics</h5>
            <div class="carousel-cont">
                <div id="carouselExampleControls" class="carousel slide carousel-css" data-ride="carousel">
                    <div class="carousel-inner ">
                        <div class="carousel-item active">
                            <div class="square-button">
                                <button class="box ">VITAMINS<img class="img-topics" src="https://cdn-icons-png.flaticon.com/512/4887/4887988.png" alt=""></button>
                                <button class="box">FLU REMEDIES <img class="img-topics" src="https://static.vecteezy.com/system/resources/thumbnails/014/604/165/small/girl-sick-face-cartoon-cute-png.png" alt=""></button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="square-button">
                                <button class="box">KIDS NUTRITION <img class="img-topics" src="https://img.pikbest.com/png-images/nutritious-and-delicious-soy-milk-png-elements_2495184.png!sw800" alt=""></button>
                                <button class="box">ABSORBENT HYGIENE PRODUCTS <img class="img-topics" src="https://cdn-icons-png.flaticon.com/512/1521/1521240.png" alt=""></button>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-success rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-success rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                </div>
            </div>

        </div>


    </div>
    <div id="About" class="cont">
        <p class="guide">About</p>
        <h1 class="aboutus-header">The Dream of Road 1 Pharmacy</h1>
        <p class="aboutus-p">Provide the best pharmaceutical services for patients.</p>
        <div class="container-fluid " id="about">
            <div class="row justify-content-evenly">
                <div class="card-box col-lg-5 col-md-5 col-sm-5">
                    <div class="img-cont">
                        <img class="card-img" src="img/rdu3.jpg" alt="">
                        <p class="faq-card-yellow ">01</p>
                    </div>
                    <div class="card-info">
                        <p class="caption">MENITA BORBON</p>
                        <p class="definition">Pharmacist/Purchaser</p>
                    </div>
                </div>
                <div class="card-box col-lg-5 col-md-5 col-sm-5">
                    <div class="img-cont">
                        <img class="card-img" src="img/frontend3.jpg" alt="">
                        <p class="faq-card-yellow">02</p>
                    </div>
                    <div class="card-info">
                        <p class="caption">RONALDO BORBON</p>
                        <p class="definition">Proprietor</p>
                    </div>
                </div>


                <!-- <div class="card-box col-lg-4 col-md-7 col-sm-7 small-card">
                    <div class="img-cont">
                        <p class="faq-card-yellow">00</p>
                    </div>
                    <div class="card-info">
                        <p class="caption">Location</p>
                        <p class="definition">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut fugit aut possimus suscipit pariatur sequi et dolorum, totam ratione assumenda doloremque, odit nisi! Provident deleniti dolorum natus alias aut corporis totam eaque nostrum voluptatibus! Omnis natus placeat obcaecati cumque qui, sequi at maiores ipsum optio debitis expedita odit ullam eos.</p>
                    </div>
                </div>
                <div class="card-box col-lg-4 col-md-7 col-sm-7 small-card">
                    <div class="img-cont">
                        <p class="faq-card-yellow">00</p>
                    </div>
                    <div class="card-info">
                        <p class="caption">Founded Date</p>
                        <p class="definition">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, eveniet. Asperiores quas at odit doloremque eius, repellendus, velit, quos rerum sunt beatae corrupti expedita molestias aut nisi est reprehenderit deserunt fugiat mollitia maiores laboriosam similique culpa deleniti. Error, similique sapiente?</p>
                    </div>
                </div> -->
            </div>
        </div>

    </div>
    <div class="cont" id="faq">
        <p class="guide">FAQ</p>
        <div class="faq">
            <div class="faq-section1">
                <h1>Pharmacy benefits and services</h1>
            </div>
            <div class="faq-section2">
                <div class="faq-box">
                    <div class="faq-card">
                        <a class="faq-icon" href="https://maps.app.goo.gl/T6Y8MSbjgEYKvnnf7"><i class="bi bi-map"></i></i></a>
                        <p class="caption faq-p">Find the location of the Pharmacy</p>
                        <!-- <p class="definition">Unit 2, Ipo Road cor, Road 1 , Minuyan Proper, City of San Jose del Monte, Bulacan</p> -->
                        <iframe class="gmaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.6919732709853!2d121.07851119999998!3d14.8425359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397af55773a7a17%3A0xfe00da48e36d6f5c!2sRoad%201%20Pharmacy%20Convenience%20Store!5e0!3m2!1sfil!2sph!4v1715661497604!5m2!1sfil!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="faq-card">
                        <a class="faq-icon"><i class="bi bi-chat-square-text" ></i></a>
                        <p class="caption faq-p">Where to communicate</p>
                        <p class="definition">Contact us Here: <br>
                            Number : #09123456789 <br>
                            Email : <br> <a href="mailto:road1pharmacy@gmail.com"> road1pharmacy@gmail.com</a>
                        </p>
                    </div>
                    <div class="faq-card">
                        <a class="faq-icon"><i class="bi bi-clipboard-check"></i></a>
                        <p class="caption faq-p">See if Drug is available</p>
                        <p class="definition">It easy to find out if a certain Drug is available. All you need to know is the name and the correct spelling of the medicine you are looking for</p>
                    </div>
                    <div class="faq-card">
                        <a class="faq-icon"><i class="bi bi-stack"></i></a>
                        <p class="caption faq-p">Check if the Medicine have stocks</p>
                        <p class="definition">Ask if a specific medicine has stock by messaging the chatbot on the lower right part</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer container-fluid" >
        <div class="row inner-footer justify-content-evenly">
            <div class=" col-lg-3 col-md-6 col-sm-12">
                <div class="footer-h1 ">
                    <img src="img/IMG_5789__1_-removebg-preview.png" class="footer-logo" alt="logo">
                    <h1>Road 1 Pharmacy</h1>
                </div>
                <h5>Your one stop healthcare pharmacy</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12"   >
                <p style="padding: 50px 50px 0 50px;">
                <p>Location: <br> <a href="https://maps.app.goo.gl/T6Y8MSbjgEYKvnnf7">Unit 2, Ipo Road cor, Road 1 , Minuyan Proper, City of San Jose del Monte, Bulacan</a></p>
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <p style="padding: 50px 50px 0 50px;">
                    Cellphone no. : #09123456789 <br>
                </p>    
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <p style="padding: 50px 50px 0 50px;">
                    Email: <br>
                    <a href="mailto:road1pharmacy@gmail.com"> road1pharmacy@gmail.com</a>
                </p>    
            </div>
        </div>
    </footer>
    <div class="ai-chatbot">
        <a class="chatbot" onclick="toggleChatbox()"><img class="chatbot" src="img/chatbot_icon.gif" alt="" title="Hi"></a>
    </div>

    <div id="chatbox" style="display: none;">
        <a onclick="closeChatBox()"><i class="fas fa-times"></i></a>
        <?php
        include 'database/config.php';

        $sql = "SELECT greetings FROM training_greetings";
        $result = mysqli_query($conn, $sql);
        $greet = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $greet[] = $row['greetings'];
        }
        $randomIndex = array_rand($greet);
        $randomValue = $greet[$randomIndex];


        ?>

        <body id="chat_body">
            <div class="chat-container">
                <h2>Alternative Medicine Chatbot</h2>
                <div class="chat-messages" id="chat-messages">
                    <div class="bot-message"><?php echo $randomValue; ?></div>
                </div>
                <form id="chat-form">
                    <input type="text" id="user-input" placeholder="Type your message...">
                    <button type="submit">Send</button>
                </form>
            </div>

            <script>
                document.getElementById('chat-form').addEventListener('submit', function(event) {
                    event.preventDefault();
                    sendMessage();
                });

                function sendMessage() {
                    var userInput = document.getElementById('user-input').value;
                    appendMessage('user', userInput);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'chatbotkuno/index.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            var botResponse = xhr.responseText;
                            appendMessage('bot', botResponse);
                        }
                    };
                    xhr.send('input=' + userInput);
                }

                function appendMessage(sender, message) {
                    var chatMessages = document.getElementById('chat-messages');
                    var messageDiv = document.createElement('div');
                    messageDiv.className = sender + '-message';
                    messageDiv.textContent = message;
                    chatMessages.appendChild(messageDiv);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            </script>
    </div>

    <script>
        function toggleChatbox() {
            var chatbox = document.getElementById("chatbox");
            chatbox.style.display = chatbox.style.display === "none" ? "block" : "none";
            // console.log("hi");
        }

        function closeChatBox() {
            var chatbox = document.getElementById("chatbox");
            chatbox.style.display = chatbox.style.display === "none" ? "block" : "none";
        }
    </script>
</body>
<script>
    $(document).ready(function() {
        $('.chatbot').click(function(e) {
            e.preventDefault();

            console.log("Hello World");


        });
    });
</script>

</html>
