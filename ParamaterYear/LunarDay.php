<?php
  include '../moonPhase/php-moon-phase/Solaris/MoonPhase.php';

  class LunarDay {
    public $myaamiaName;
    public $englishName;
    public $gregorianDate;
    public $dayOfLunarMonth;
    public $moonPhase;
    public $moonPhaseName;

    function __construct($curDate, $dayOfMonth) {
      $this->myaamiaName = $this->convert_day($curDate);
      $d = date_parse_from_format('Y-m-d', $curDate);
      $this->gregorianDate = $curDate;
      $this->englishName = date('l', strtotime($curDate));
      $this->dayOfLunarMonth = $dayOfMonth;
      $this->moonPhase = (new Solaris\MoonPhase(strtotime($curDate)))->phase();
      $this->moonPhaseName = (new Solaris\MoonPhase(strtotime($curDate)))->phase_name(); 
    }

    public function convert_day($date) {
      $day = '';
      $dayName = date('l', strtotime($date));
      switch ($dayName) {
        case 'Monday':
          $day = 'nkotakone';
          break;
        case 'Tuesday':
          $day = 'niišakone';
          break;
        case 'Wednesday':
          $day = 'nihsokone';
          break;
        case 'Thursday':
          $day = 'niiyakone';
          break;
        case 'Friday':
          $day = 'yaalanokone';
          break;
        case 'Saturday':
          $day = 'kaakaathsokone';
          break;
        case 'Sunday':
          $day = 'eelaamini-kiišikahki';
          break;
      }
      return $day;
    }
  }
?>
