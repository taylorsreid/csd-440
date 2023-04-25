<!--
    Taylor Reid
    4/24/2023
    CSD 440 Module 9 Assignment

    The purpose of this program is to 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for a Shift</title>
    <link rel="stylesheet" href="TaylorStyle.css">
</head>
<body>

    <?php include_once "./TaylorHeader.html"; ?>
        
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>

        <h1>Search for a Shift</h1>

        <div class="flexBox">

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <h2>Search by Hourly Rate</h2>
                <p>
                    <?php require "./TaylorOperatorList.php" ?>
                    <input type="number" name="searchValue" step="0.01" required>
                </p>
                <p><input type="submit" value="Search"></p>
                <input type="hidden" name="searchColumn" value="hourly_rate">
            </form>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <h2>Search by Hours Worked</h2>
                <p>
                    <?php require "./TaylorOperatorList.php" ?>
                    <input type="number" name="searchValue" step="0.01" required>
                </p>
                <p><input type="submit" value="Search"></p>
                <input type="hidden" name="searchColumn" value="hours_worked">
            </form>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <h2>Search by Date</h2>
                <p>
                    <?php require "./TaylorOperatorList.php" ?>
                    <input type="date" name="searchValue" max="<?= date("Y-m-d") ?>" required>
                </p>
                <p><input type="submit" value="Search"></p>
                <input type="hidden" name="searchColumn" value="date">
            </form>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <h2>Search by Tips</h2>
                <p>
                    <?php require "./TaylorOperatorList.php" ?>
                    <input type="number" name="searchValue" step="0.01" required>
                </p>
                <p><input type="submit" value="Search"></p>
                <input type="hidden" name="searchColumn" value="tips">
            </form>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <h2>Search by Job</h2>
                <p>
                    <input type="hidden" name="searchOperator" value="=">
                    <input type="text" name="searchValue" required>
                </p>
                <p><input type="submit" value="Search"></p>
                <input type="hidden" name="searchColumn" value="job">
            </form>

        </div>

    <?php } ?>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

        <h1>Search Results</h1>

        <table class="content">

        <?php
            require_once "./TaylorConnectionManager.php";

            // The purpose of this is to ensure that users don't send SQL injection attacks in the operator attribute.
            // Since equality operators cannot be set via prepared statements (I've tried), we'll need to concatenate the string instead, which is dangerous.
            // This code segment checks that the user input matches one of the allowed choices, sets it if it does, and dies if it doesn't.
            switch ($_REQUEST["searchOperator"]) {
                case '=':
                case '>':
                case '>=':
                case '<':
                case '<=':
                    $searchOperator = $_REQUEST["searchOperator"];
                    break;
                
                default:
                    die("no operator specified"); //die if user sent something besides a valid choice
                    break;
            }

            //
            switch ($_REQUEST["searchColumn"]) {
                case 'hourly_rate':
                case 'hours_worked':
                case 'date':
                case 'tips':
                case 'job':
                    $searchColumn = $_REQUEST["searchColumn"];
                    break;
                
                default:
                    die("no field to search specified");
                    break;
            }

            try {
                $searchValue = $_REQUEST["searchValue"];
                $sql = "SELECT * FROM `shift` WHERE {$searchColumn} {$searchOperator} ?";
                $conn = new ConnectionManager();
                $ps = $conn->prepare($sql);

                if (is_numeric($searchColumn)) {
                    $ps->bind_param("d", $searchValue);
                }
                else {
                    $ps->bind_param("s", $searchValue);
                }

                $ps->execute();
                $rs = $ps->get_result();
        ?>      
            <tr>
                <th>Hourly Rate</th>
                <th>Hours Worked</th>
                <th>Date</th>
                <th>Tips</th>
                <th>Job</th>
            </tr>
        <?php while ($row = $rs->fetch_assoc()) { ?>
            <tr>
                <td><?= $row["hourly_rate"] ?></td>
                <td><?= $row["hours_worked"] ?></td>
                <td><?= $row["date"] ?></td>
                <td><?= $row["tips"] ?></td>
                <td><?= $row["job"] ?></td>
            </tr>
        <?php }
            }
            catch (\Throwable $th) {
                echo $th->__toString();
            }
            finally {
                $conn->close();
            }
        ?>

        </table>

        <p style="text-align: center;">
            <a href="<?= $_SERVER['PHP_SELF'] ?>">New Search</a>
        </p>

    <?php } ?>


</body>
</html>