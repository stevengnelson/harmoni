-- phpMyAdmin SQL Dump
  `ID` int(11) NOT NULL default '0',
  `Course` text NOT NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;
  `FK_teams` varchar(255) NOT NULL default '',
  `data_id` varchar(255) NOT NULL default '',
  `lenom` blob NOT NULL,
  `lesize` varchar(255) NOT NULL default ''
) TYPE=MyISAM COMMENT='asdf';
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `ext` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `ext` (`ext`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;
  `id` int(11) NOT NULL auto_increment,
  `image` blob,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL
) TYPE=MyISAM;
  `filename` text NOT NULL,
  `size` int(11) NOT NULL default '0',
  `path` text NOT NULL,
  `data` blob NOT NULL
) TYPE=MyISAM;
  `ID` int(11) NOT NULL default '0',
  `FirstName` text NOT NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;
  `id` int(10) unsigned NOT NULL auto_increment,
  `FK` int(10) unsigned NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2443429 ;
  `id` int(10) unsigned NOT NULL auto_increment,
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=3004577 ;
  `id` int(10) NOT NULL default '0'
) TYPE=MyISAM;
  `name` varchar(255) NOT NULL default '',
  `last_name` varchar(255) NOT NULL default '',
  `age` int(11) default NULL
) TYPE=MyISAM;