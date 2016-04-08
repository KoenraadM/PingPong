Feature: List All Player Resources
  In order to get a list of all players
  I should call /players

  Scenario: When calling '/players' I should receive a 200 OK HTTP Status Code
    Given I send a GET request to "/players"
    Then the response code should be 200