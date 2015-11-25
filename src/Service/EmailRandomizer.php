<?php
namespace ArnasPet\ChristmasExchange\Service;

class EmailRandomizer
{
    public function addRandomReceiversToSenders(array $senders)
    {
        $receivers = $senders;
        shuffle($receivers);

        foreach ($senders as &$sender) {
            $sender['receiver'] = current($receivers);
            next($receivers);
        }
        reset($senders);

        // check for collisions
        foreach ($senders as $key => &$sender) {
            if ($sender['receiver']['email'] === $sender['email']) {
                $nextKey = ($key + 1) % count($senders);
                $temp = $sender['receiver'];
                $sender['receiver'] = $senders[$nextKey ]['receiver'];
                $senders[$nextKey]['receiver'] = $temp;
            }
        }

        return $senders;
    }
}
