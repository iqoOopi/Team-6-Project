<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: draw insert agent table
    *
    *************************************************
 -->
<?php
    function drawTable($tempValue, $placeHolder)
    {
    print <<<EOF
        <form class="Form newAgent" method="post" action="newAgentInsert.php">
        <label for="AgtFirstName">FirstName:</label>
        <input type="text" name="AgtFirstName" id="AgtFirstName" placeholder="{$placeHolder['AgtFirstName']}"value="{$tempValue['AgtFirstName']}">

        <label for="AgtMiddleInitial">Middle Initial:</label>
        <input type="text" name="AgtMiddleInitial" id="AgtMiddleInitial" placeholder="{$placeHolder['AgtMiddleInitial']}" value="{$tempValue['AgtMiddleInitial']}">

        <label for="AgtLastName">LastName:</label>
        <input type="text" name="AgtLastName" id="AgtLastName" placeholder="{$placeHolder['AgtLastName']}"value="{$tempValue['AgtLastName']}">

        <label for="AgtBusPhone">Phone Number:</label>
        <input type="text" name="AgtBusPhone" id="AgtBusPhone" >

        <label for="AgtEmail">Email:</label>
        <input type="text" name="AgtEmail" id="AgtEmail" placeholder="{$placeHolder['AgtEmail']}"value="{$tempValue['AgtEmail']}">

        <label for="AgtPosition">Position:</label>
        <div class="radioButtonContainer">
            <label class="radioOptionContainer">
                <input type="radio" name="AgtPosition" value="Senior Agent"> Senior Agent
            </label>
            <label class="radioOptionContainer">
                <input type="radio" name="AgtPosition" value="Intermediate Agent"> Intermediate Agent
            </label>
            <label class="radioOptionContainer">
                <input type="radio" name="AgtPosition" value="Junior Agent"> Junior Agent
            </label>
        </div>
        <label for="AgencyId">Agency ID:</label>
        <input type="text" name="AgencyId" id="AgencyId" placeholder="{$placeHolder['AgencyId']}" value="{$tempValue['AgencyId']}">
        <input type="hidden" name="tblName" value="agents">

        <input type="reset" name="reset" class="button" id="formRest" value="Reset">
        <input type="submit" name="submit" class="button" id="formSubmit" value="Submit">
        </form>
EOF;
    }
?>