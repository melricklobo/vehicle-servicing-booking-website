Feature: Employee registration

  Scenario Outline: Register Employee
    Given Browser is open
    And Admin is logged in
    When Admin clicks on add employee button
    And Admin provides employee details
    And Admin submits employee data
    Then employee gets registered

    