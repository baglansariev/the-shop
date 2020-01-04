<?php
    namespace app\controllers\wallet;
    use core\lib\Session;

    class Wallet
    {
        private $session;

        public function __construct(Session $session, $money = 100)
        {
            $this->session = $session;

            // If session is expired, it sets new value (default $100)
            if ( !$this->hasMoney() )
            {
                $this->putMoney($money);
            }
        }

        public function getMoney()
        {
            return $this->session->get('money');
        }

        public function putMoney($money)
        {
            $this->session->set('money', $money);
        }

        public function pay($expenses)
        {
            if ($this->hasMoney() && $this->getMoney() > 0)
            {
                $this->putMoney( $this->getMoney() - $expenses );
                return true;
            }
            return false;
        }

        // Checks, is there money in the wallet
        public function hasMoney()
        {
            if ($this->getMoney())
            {
                return true;
            }
            return false;
        }
    }