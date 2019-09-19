<?php

use PHPUnit\Framework\TestCase;

class NewCollectionTest extends TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items(): void
    {
        $collection = new \App\Support\NewCollection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in(): void
    {
        $collection = new \App\Support\NewCollection(['one', 'five', 'seven']);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items(): void
    {
        $collection = new \App\Support\NewCollection(['one', 'two', 'three', 'four']);

        $this->assertCount(4, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[2], 'three');
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate(): void
    {
        $collection = new \App\Support\NewCollection;
        
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated(): void
    {
        $collection = new \App\Support\NewCollection([
            'one', 'two', 'three'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }
        
        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection(): void
    {
        $collection1 = new \App\Support\NewCollection(['one', 'two']);
        $collection2 = new \App\Support\NewCollection(['three', 'four', 'five']);
        
        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());
    }

    /** @test */
    public function can_add_to_existing_collection(): void
    {
        $collection = new \App\Support\NewCollection(['one', 'three']);
        $collection->add(['three']);
        
        $this->assertCount(3, $collection->get());
        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function returns_json_encoded_items(): void
    {
        $collection = new \App\Support\NewCollection([
            ['username' => 'kyle'],
            ['username' => 'jess']
        ]);
        
        $this->assertInternalType('string', $collection->toJson());
        $this->assertEquals('[{"username":"kyle"},{"username":"jess"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json(): void
    {
        $collection = new \App\Support\NewCollection([
            ['username' => 'kyle'],
            ['username' => 'jess']
        ]);

        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertEquals('[{"username":"kyle"},{"username":"jess"}]', $encoded);
    }
}