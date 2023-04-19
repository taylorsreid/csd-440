<!--
    Taylor Reid
    4/14/2023
    CSD 440 Module 7 Assignment

    The purpose of this program is to 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        #header {
            text-align: right;
        }

        #title {
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        th {
            text-decoration: underline;
        }

        th, td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

    </style>

</head>
<body>

    <div id="header">
        <p>Taylor Reid</p>
        <p>4/14/2023</p>
        <p>CSD 440 Module 7 Assignment</p>
    </div>
    
    <h1 id="title">Form - New Employee</h1>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $eighteenYearsAgo = date_format(date_modify(date_create(), "-18 years"), "Y-m-d"); //find date exactly 18 years ago
        $minimumSalary = 35568; //federal minimum exempt salary
        ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <table>

                <!-- firstName -->
                <tr>
                    <td>
                        <label for="firstName">First Name:</label>
                    </td>
                    <td>
                        <input type="text" name="firstName" id="firstName">
                    </td>
                </tr>

                <!-- lastName -->
                <tr>
                    <td>
                        <label for="lastName">Last Name:</label>
                    </td>
                    <td>
                        <input type="text" name="lastName" id="lastName">
                    </td>
                </tr>

                <!-- dateOfBirth -->
                <tr>
                    <td>
                        <label for="dateOfBirth">Date of Birth:</label>
                    </td>
                    <td>
                        <input type="date" name="dateOfBirth" id="dateOfBirth" max="<?= $eighteenYearsAgo ?>">
                        <label for="dateOfBirth">(minimum age is 18)</label>
                    </td>
                </tr>

                <!-- multi select roles -->
                <tr>
                    <td>
                        <label for="roles">Role(s):</label>
                    </td>
                    <td>
                        <select name="roles[]" id="roles" multiple>
                            <option value="Software Engineer" selected>Software Engineer</option>
                            <option value="DevOps Engineer">DevOps Engineer</option>
                            <option value="Database Adminstrator">Database Adminstrator</option>
                        </select>
                    </td>
                </tr>

                <!-- salary -->
                <tr>
                    <td>
                        <label for="salary">Salary:</label>
                    </td>
                    <td>
                        $<input type="number" name="salary" id="salary" min="<?= $minimumSalary ?>" value="<?= $minimumSalary ?>">.00 / year
                    </td>
                </tr>

                <!-- email -->
                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="favoriteColor">Favorite Color</label>
                    </td>
                    <td>
                        <input type="color" id="favoriteColor" name="favoriteColor" value="#e66465">
                    </td>
                </tr>

                <!-- submit -->
                <tr>
                    <td colspan="2">
                        <input type="submit">
                    </td>
                </tr>
            </table>
        </form>
        
    <?php } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $validFormData = true;

        function validate($input){
            if (is_array($input)) { //check if is array
                return !empty($input); //return false if array is empty (invalid)
            }
            else {
                return $input != ""; //check that input isn't empty
            }
        }

    ?>
        <table>
        <?php foreach ($_POST as $key => $value) { //iterate through all passed form values ?>
            <tr>
            <?php if (validate($value)) { //check that values aren't empty
                    if (is_array($value)) {
                        foreach ($value as $subValue) { //if array then iterate through ?>
                            <tr>
                                <td>role</td>
                                <td><?= $subValue ?></td>
                            </tr>
                <?php } } else { //otherwise output key and value ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                            </tr>
            <?php } } else {
                $validFormData = false; //set flag to false if one of the form data entries fails validation
            ?>
                <tr>
                    <td><?= $key ?></td>
                    <td>***CANNOT BE EMPTY***</td>
                </tr>
        <?php } } ?>
        </tr>
        </table>
        <?php if ($validFormData) { //ouput different messages whether form data is valid or not ?>
                <div style="color: green; text-align: center;">
                    Your form entries are valid.
                </div>
        <?php } else { ?>
            <div style="color: red; text-align: center;">
                Your form entries are invalid.
            </div>
         <?php }} ?>
    
</body>
</html>