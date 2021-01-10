<style>
    /* Remove Arrow/Spinner in number input */
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button w3-hover-white"><img src="view/img/logo.png" class="logo"></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="logoutAdmin" class="w3-bar-item w3-button w3-blue">LOGOUT</a>
        </div>
    </div>
</div>

<div class="w3-content w3-padding" style="max-width: 1500px; margin-top: 5%;">
    <div class="w3-xxlarge w3-border-bottom" style="width: 1455px; margin: auto">
        <h2>Welcome to Admin Page</h2>
    </div>

    <div class="w3-container w3-margin-top" id="">
        <form class="" method="post" action="input-data">
            <table>
                <tr>
                    <td style="width: 45%">Date</td>
                    <td>:</td>
                    <td><input type="date" name="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo $firstCase; ?>" max="<?php echo date("Y-m-d"); ?>" style="height: 28px; margin-right: 16px"></td>
                </tr>
                <tr>
                    <td>Province</td>
                    <td>:</td>
                    <td>
                        <select name="province" id="" style="height: 28px; margin-right: 16px">
                            <?php
                            foreach ($provinces as $key => $row) {
                                echo "<option value=" . $row->getProvince() . ">" . $row->getProvince() . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Confirmed</td>
                    <td>:</td>
                    <td><input type="number" name="confirmed"></td>
                </tr>
                <tr>
                    <td>Released</td>
                    <td>:</td>
                    <td><input type="number" name="released"></td>
                </tr>
                <tr>
                    <td>Death</td>
                    <td>:</td>
                    <td><input type="number" name="death"></td>
                </tr>
            </table>
            <div style="width: 100%; margin-top: 1%;">
                <button class="w3-button w3-blue">ADD</button>
            </div>
        </form>
    </div>

    <div class="w3-container w3-margin-top" style="width: 1400px; margin: auto">
        <table class="w3-table w3-bordered">
            <tr>
                <th class="w3-center">Date</th>
                <th class="w3-center">Time</th>
                <th class="w3-center">Province</th>
                <th class="w3-center">Confirmed</th>
                <th class="w3-center">Released</th>
                <th class="w3-center">Deceased</th>
            </tr>
            <?php
            foreach ($timeProvinces as $key => $row) {
                echo "<tr>";
                echo "<td class='w3-center'>" . $row->getDate() . "</td>";
                echo "<td class='w3-center'>" . $row->getTime() . "</td>";
                echo "<td class='w3-center'>" . $row->getProvince() . "</td>";
                echo "<td class='w3-center'>" . $row->getConfirmed() . "</td>";
                echo "<td class='w3-center'>" . $row->getReleased() . "</td>";
                echo "<td class='w3-center'>" . $row->getDeceased() . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="w3-container w3-margin-top w3-center w3-bar" style="width: 1755px; margin: auto">
        <?php
        if ($previousPage < 1) {
            echo '<a href="?page=1" class="w3-bar-item w3-button">&laquo;</a>';
        } else {
            echo '<a href="?page=' . $previousPage . '" class="w3-bar-item w3-button">&laquo;</a>';
        }
        ?>
        <?php for ($i = 1; $i <= $page; $i++) : ?>
            <?php
            if ($i == $activePage) {
                echo '<a class="w3-button w3-blue" href="?page=' . $i . '">' . $i . '</a>';
            } else {
                echo '<a class="w3-button" href="?page=' . $i . '">' . $i . '</a>';
            }
            ?>
        <?php endfor; ?>
        <?php
        if ($nextPage > $page) {
            echo '<a href="?page=' . $page . '" class="w3-button">&raquo;</a>';
        } else {
            echo '<a href="?page=' . $nextPage . '" class="w3-button">&raquo;</a>';
        }
        ?>
    </div>
</div>