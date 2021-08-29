Feature: Login

  Scenario Outline: Login
    Given Browser is open
    And User is on login page
    When User Provides login details
    And user clicks login
    Then the user is logged in
