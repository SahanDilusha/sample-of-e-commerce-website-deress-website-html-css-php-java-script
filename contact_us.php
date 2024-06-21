<?php
include "connecton.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php include "navbar.php";
    include "spinners.php";
    ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-6 img-div2 min-vh-100 d-none d-lg-block">

            </div>

            <div class="col-12 col-lg-6 vh-100 d-flex flex-column justify-content-center align-items-center px-5">
                <div class="d-flex flex-column w-100  mb-4">
                    <h3 class="jost-bold">Contact Us</h3>
                    <label class="text-secondary jost-normal">Please enter details</label>
                </div>

                <form id="contact_form" name="contact_form" method="post" class="w-100 mb-3">
                    <div class="mb-3 row">
                        <div class="col">
                            <label>First Name</label>
                            <input type="text" required maxlength="45" class="form-control" id="fname" name="first_name">
                        </div>
                        <div class="col">
                            <label>Last Name</label>
                            <input type="text" required maxlength="45" class="form-control" id="lname" name="last_name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="email_addr">Email address</label>
                            <input type="email" required maxlength="100" class="form-control" id="email" name="email" />
                        </div>
                        <div class="col">
                            <label for="phone_input">Phone</label>
                            <input type="tel" required maxlength="10" class="form-control" id="mobile" name="Phone" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message">Option</label>
                        <select class="form-select" id="rid" aria-label="Select">
                            <option selected value="0">Select</option>
                            <?php

                            $getOption = Database::search("SELECT * FROM `request_type` WHERE `types_types_id` = '2';");

                            if ($getOption->num_rows !== 0) {

                                for ($i = 0; $i < $getOption->num_rows; $i++) {
                                    $row = $getOption->fetch_assoc();

                            ?>
                                    <option value="<?=$row["request_type_id"]?>"><?=$row["request_type_name"]?></option>
                            <?php

                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="msg" name="message" rows="5" maxlength="150"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark py-1 px-4 btn-lg" onclick="ContactUsSend();">Post</button>
                </form>
            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="error" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="fs-5" id="error-text"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>