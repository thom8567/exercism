<?php
class Bob
{
    function respondTo(string $sentence) : string
    {
        $sentenceToTest = preg_replace('/[^a-zA-Z0-9!?]/', '', trim($sentence));

        if ($this->isEmpty($sentenceToTest)) {
            return 'Fine. Be that way!';
        }
        if ($this->isQuestion($sentenceToTest)) {
            if ($this->isYell($sentenceToTest)) {
                return "Calm down, I know what I'm doing!";
            }
            return 'Sure.';
        }
        if ($this->isYell($sentenceToTest)) {
            return 'Whoa, chill out!';
        }
        return 'Whatever.';
    }
    function isEmpty(string $sentence) : bool
    {
        return empty($sentence);
    }
    function isQuestion(string $sentence) : bool
    {
        return $this->checkPunctuation($sentence, '?');
    }
    function isYell(string $sentence) : bool
    {
        return false == preg_match('/[a-z]/', $sentence) && preg_match('/[A-Z]/', $sentence);
    }
    function checkPunctuation(string $sentence, string $punctuation) : bool
    {
        return mb_strpos($sentence, $punctuation) === (mb_strlen($sentence) - 1);
    }
}

