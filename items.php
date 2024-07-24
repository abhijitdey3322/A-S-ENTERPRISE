<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="mb-0 overflow-auto" style="height:190px;" >
                        <table class="table table-striped text-center" id="products">
                            <thead class="table-primary" style="position:sticky; top:0;">
                                <tr>
                                    <th>SL NO.</th>
                                    <th>Barcode No.</th>
                                    <th>Goods Name</th>
                                    <th>Description</th> <!-- Adjust the width as needed -->
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>HSN/SAC</th>
                                    <th>GST</th>
                                    <th>Brand Name</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                        // SQL query
                                    $sql = "SELECT id, barcode, name, description, amount, quantity, `HSN/SAC` AS hsn_sac, gst, brand FROM goods ORDER BY id DESC";
                                    // Execute query
                                    $result = $conn->query($sql);
                                    if ($result === false) {
                                        // Handle query error
                                        echo "<tr><td colspan='10'>Error executing query: " . $conn->error . "</td></tr>";
                                    } else {
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo '<tr scope="row">';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["id"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["barcode"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["name"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["description"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["amount"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["quantity"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["hsn_sac"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["gst"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["brand"] . '</td>';
                                                if ($user['status'] === 'active') {
                                                    echo '<td><a href="backend/delete.php?id=' . $row["id"] . '&table=goods" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a></td>';
                                                }
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>0 results</td></tr>";
                                        }
                                    }
                                ?>
                        
                            </tbody>
                        </table>
                    </div>
    
</body>
</html>