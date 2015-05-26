Feature: decimal
    In order to have a truly decimal numbers
    I need to provide a string or decimal

Scenario: Display a truly decimal
        Given Decimal:: I have the string "2"
        Then Decimal:: I should get "2.00"

Scenario: Display a truly decimal when an int is added
        Given Decimal:: I have the string "2"
        When Decimal:: I add "3"
        Then Decimal:: I should get "5.00"

Scenario: Respond to toArray method
        Given Decimal:: I have the string "3"
        Then Decimal:: I call toArray and get a valid item

Scenario: Respond to toJson method
        Given Decimal:: I have the string "3"
        Then Decimal:: I call toJson and get a valid item

Scenario: Return true when comparing to another item
        Given Decimal:: I have the string "3"
        Then Decimal:: I check if "3.00" is equal

Scenario: Return true when checking if positive
        Given Decimal:: I have the string "1"
        Then Decimal:: I check if it is positive
