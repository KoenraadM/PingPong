Feature: Search Parcel By Address
  In order to find parcels by address
  I need to be able to search for parcels based on an address

  Scenario: When providing incomplete data we expect a 400 BAD REQUEST http response
    Given I send a POST request to "/v1/parcels/by-address/"
    Then the response code should be 400