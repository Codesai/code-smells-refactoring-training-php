<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLength = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLength; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l" || $command === "r") {
                // Rotate Rover
                if ($this->direction === "N") {
                    if ($command === "r") {
                        $this->direction = "E";
                    } else {
                        $this->direction = "W";
                    }
                } else if ($this->direction === "S") {
                    if ($command === "r") {
                        $this->direction = "W";
                    } else {
                        $this->direction = "E";
                    }
                } else if ($this->direction === "W") {
                    if ($command === "r") {
                        $this->direction = "N";
                    } else {
                        $this->direction = "S";
                    }
                } else {
                    if ($command === "r") {
                        $this->direction = "S";
                    } else {
                        $this->direction = "N";
                    }
                }
            } else {
                // Displace Rover
                $displacement1 = -1;

                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                if ($this->direction === "N") {
                    $this->y += $displacement;
                } else if ($this->direction === "S") {
                    $this->y -= $displacement;
                } else if ($this->direction === "W") {
                    $this->x -= $displacement;
                } else {
                    $this->x += $displacement;
                }
            }
        }
    }
}
