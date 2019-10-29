<?php

namespace Lunkkun\RobotNames;

class Generator extends \IteratorIterator
{
    public function __construct(array $characterSets)
    {
        parent::__construct($this->generator($characterSets));
    }

    protected function generator($characterSets): \Generator
    {
        $characters = array_pop($characterSets);

        if (empty($characterSets)) {
            shuffle($characters);
            foreach ($characters as $character) {
                yield $character;
            }
        } else {
            $generators = [];
            $countRemaining = count($characters);

            while (true) {
                $key = rand(0, $countRemaining - 1);
                $character = $characters[$key];

                if (array_key_exists($character, $generators)) {
                    $generator = $generators[$character];
                } else {
                    $generator = $this->generator($characterSets);
                    $generators[$character] = $generator;
                }

                if ($generator->valid()) {
                    yield $generator->current() . $character;
                    $generator->next();
                } else {
                    array_splice($characters, $key, 1);
                    $countRemaining--;
                    if ($countRemaining === 0) {
                        break;
                    }
                }
            }
        }
    }
}
