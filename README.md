# Team-6-Project
Entry 1: Hello guys, I modified Henry's generic insert function to work with prepare statements, everything else is left the same other than `functions.php`, `agentClass.php` and `agent.php`.
- `agent.php`
    - empty input field for table name as discussed with Henry 
- `agentClass.php`
    - added three new functions
- `functions.php`
    - updated agent insert to generic insert as discussed with Henry
    - incorporated prepare statements

## Insert Function

- To call the function
    
        insertIntoDB(PHP Data Object, Database Object, Database table name);

- e.g.

        insertIntoDB($pdo_obj, $agt_obj, $tbname);

- `$pdo_obj`
    - the `connect_db()` function returns a `pdo object` which can then be used for prepare statements

- `$tbname`
    - to get the `tbname` create an empty input field in your form
    - e.g.
            
            <input type="hidden" name="tbName" value="agents">

    - in the `value` attribute, insert the corresponding table name from the database

**Note**:
In order for the insert function to work, three additional functions are required when creating your class

        // Stringify the field names corresponding to the field names in the database
        // e.g. AgtFirstName,AgtMiddleInitial,AgtLastName....
        public function fieldString() {
            foreach ($this as $key => $value) {
                $tempArray[] = $key;
            } 

            $fieldString = implode("," , $tempArray);
            return $fieldString;
        }

        // Stringify the prepare statement
        // e.g. :AgtFirstName,:AgtMiddleInitial,:AgtLastName....
        public function prepString() {
            foreach ($this as $key => $value) {
                $tempArray[] = $key;
            }

            $prepString = implode(",:" , $tempArray);
            $prepString = ":" . $prepString;
            return $prepString;
        }

        // Return an associative array of the properties and values
        // e.g. AgtFirstName => Jane
        //      AgtMiddleInitial => A.
        //      AgtLastname => Doe
        //      ......
        public function objToArray() {
            $array = [];
            foreach ($this as $key => $value) {
                $array[$key] = $value;
            }
            return $array;
        }
        

            
