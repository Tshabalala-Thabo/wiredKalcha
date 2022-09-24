 <?php 
    include '../php/connection.php'; 
    $m_id = $_GET['mid'];

    $sql = "SELECT m_id, name, email, phone, message, subject, DATE_FORMAT(datetime, '%d/%m/%Y') date, DATE_FORMAT(datetime, '%k:%s') time FROM messages;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $m_id = $row['m_id'];
    $name = $row['name'];
    $email = $row['email'];
    $time = $row['time'];
    $date = $row['date'];
    $message = $row['message'];
    $subject = $row['subject'];
    $phone = $row['phone'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages | <?php echo $name;?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400&display=swap" rel="stylesheet">
    <script src="../js/scripts.js"></script>

    <!--Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

    <script>
        $(document).ready(function() {

            // Delete 
            $('.delete').click(function() {
                var el = this;

                // Delete id
                var deleteid = $(this).data('id');

                // Confirm box
                bootbox.confirm("Do you really want to delete record?", function(result) {

                    if (result) {
                        // AJAX Request
                        $.ajax({
                            url: 'delvid.php',
                            type: 'POST',
                            data: {
                                id: deleteid
                            },
                            success: function(response) {

                                // Removing row from HTML Table
                                if (response == 1) {
                                    $(el).closest('tr').css('background', 'tomato');
                                    $(el).closest('tr').fadeOut(800, function() {
                                        $(this).remove();
                                    });
                                } else {
                                    bootbox.alert('Record not deleted.');
                                }

                            }
                        });
                    }

                });

            });
        });
    </script>

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
                <h1>Message</h1>
                <div class="underline"></div>

            </div>
            <div class="p-content">
                <div class="container">
                    <div class="mv-heading">
                        <h3>Name : <?php echo $name;?></h3>
                        <h3>Email : <?php echo $email;?></h3>
                        <h3>Phone : <?php echo $phone;?></h3>
                        <h3>Subject : <?php echo $subject;?></h3>
                    </div>
                    <div class="mv-details">
                        <?php echo $message;?>
                    </div>
                    <br>
                    <button class="btn btn-danger">Delete Message</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>