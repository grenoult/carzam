<?php

class FooTest extends TestCase {

  public function testMakesData()
  {
    $response = json_decode($this->call('GET', '/api/v1/cars/list/makes')->getContent());

    // Test output
    $this->assertTrue(is_array($response));
    $this->assertTrue(count($response) > 10);

    // Test data
    $error = true;
    foreach($response as $record) {
      if ($record->make == 'VOLKSWAGEN') {
        $error = false;
      }
    }
    $this->assertTrue(!$error);

    $error = true;
    foreach($response as $record) {
      if ($record->make == 'FORD') {
        $error = false;
      }
    }
    $this->assertTrue(!$error);

    $error = true;
    foreach($response as $record) {
      if ($record->make == 'MERCEDES-BENZ') {
        $error = false;
      }
    }
    $this->assertTrue(!$error);
  }

  public function testSearch() {
    $response = json_decode($this->call('GET', '/api/v1/cars/search/')->getContent());

    // Test response structure
    $this->assertTrue(property_exists($response, 'total'));
    $this->assertTrue(property_exists($response, 'per_page'));
    $this->assertTrue(property_exists($response, 'current_page'));
    $this->assertTrue(property_exists($response, 'last_page'));
    $this->assertTrue(property_exists($response, 'next_page_url'));
    $this->assertTrue(property_exists($response, 'prev_page_url'));
    $this->assertTrue(property_exists($response, 'from'));
    $this->assertTrue(property_exists($response, 'to'));
    $this->assertTrue(property_exists($response, 'data'));
    $this->assertTrue(is_array($response->data));
  }

}
?>
