<?php

class LongestIncreasingSubsequence
{
    public function find(array $list): array
    {
        $length    = [];
        $map       = [];
        $max       = 0;
        $lastIndex = -1;

        foreach ($list as $currentKey => $currentElement)
        {
            $length[$currentKey] = 1;

            foreach ($list as $prevKey => $prevElement)
            {
                if ($prevKey >= $currentKey) {
                    break;
                }

                if ($prevElement < $currentElement)
                {
                    if ($length[$prevKey] >= $length[$currentKey]) {
                        $length[$currentKey] = $length[$prevKey] + 1;
                        $map[$currentKey] = $prevKey;
                    }
                }
            }

            if($length[$currentKey] > $max)
            {
                $max = $length[$currentKey];
                $lastIndex = $currentKey;
            }
        }

        $result = [];

        for ($i = 0; $i < $max; $i++)
        {
            array_unshift($result, $list[$lastIndex]);
            $lastIndex = $map[$lastIndex];
        }

        return $result;
    }

}
