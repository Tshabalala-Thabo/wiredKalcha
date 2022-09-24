<?php include '../php/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Videos | Portal</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400&display=swap" rel="stylesheet">
    <script src="../js/scripts.js"></script>

    <!--Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

</head>

<body>

    <?php include '../php/snav.php'; ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Music Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="addvid.php?vtype=m" method="post">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-text">Paste YouTube link here</span>
                            <input type="text" name="link" id="link" aria-label="Last name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Music Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="m-body">
        <div class="main-c">
            <div class="p-header">
                <div class="underline"></div>
                <h1>Messages</h1>
                <div class="underline"></div>
                <br>
            </div>
            <div class="p-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <!--?php
                    $sql = "SELECT v_link, v_id FROM videos WHERE v_type = 'm'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $link = $row['v_link'];
                        $v_id = $row['v_id'];
                        echo '  <div class="colorr col-10 col-md-5 col-lg-5">
                                    <div class="iframe-container my-3">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/' . $link . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="v-actions">
                                    <button class="delete btn btn-danger" id="del_' . $v_id . '?>" data-id="' . $v_id . '" >Delete</button>
                                    </div>
                                </div>
                            ';
                    }
                    ?-->

                        <div class="message-container col-10 col-md-5 col-lg-3">

                            <?php
                            $sql = "SELECT m_id, name, email, message, DATE_FORMAT(datetime, '%d/%m/%Y') date, DATE_FORMAT(datetime, '%k:%s') time FROM messages;";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $m_id = $row['m_id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $time = $row['time'];
                                $date = $row['date'];
                                $message = $row['message'];
                                echo '
                                    <a href="viewm.php?mid='.$m_id.'">
                                        <div class="m-sub">
                                            <div class="m-head">
                                                <div class="m-name">'.$name.'</div>
                                                <div class="m-datetime">'.$date.'</div>
                                            </div>
                                            <div class="m-details">'.$message.'</div>
                                        </div>
                                    </a>
                                    ';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>