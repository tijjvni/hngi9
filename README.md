# hngi9

Using the same server setup from stage one:

    Create an (POST) api endoint that takes the following sample json:

{ "operation_type": Enum <addition | subtraction | multiplication> , "x": Integer, "y": Integer }

    Operation can either be addition, subtraction or mutiplication
    x can be a number and Integer datatype
    y can be a number and Integer datatype
    Based on the operation sent, perform a simple arithmetic operation on x and y
    Return a response with the result of the operation and your slack username

Sample Input:

{ "operation_type": Enum <addition | subtraction | multiplication> , "x": Integer, "y": Integer }

    Sample Response Format:

{ "slackUsername": String, "result": Integer, "operation_type": Enum.value }
