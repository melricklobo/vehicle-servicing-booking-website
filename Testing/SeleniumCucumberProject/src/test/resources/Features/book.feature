
Feature: Book Appointment

  Scenario Outline: Book Appointment
    Given User is on appointment booking page
    When User Provides details
    And user submits
    Then A new appointment is booked

    
