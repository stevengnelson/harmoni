# phpMyAdmin SQL Dump
# version 2.5.6
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: Apr 29, 2004 at 02:40 PM
# Server version: 3.23.56
# PHP Version: 4.3.2
# 
# Database : `doboHarmoniTest`
# 

# --------------------------------------------------------

#
# Table structure for table `agent`
#

CREATE TABLE `agent` (
  `agent_id` int(10) NOT NULL default '0',
  `agent_display_name` varchar(255) NOT NULL default '',
  `fk_type` int(10) NOT NULL default '0',
  PRIMARY KEY  (`agent_id`),
  KEY `agent_display_name` (`agent_display_name`),
  KEY `fk_type` (`fk_type`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Table structure for table `groups`
#

CREATE TABLE `groups` (
  `groups_id` int(10) NOT NULL default '0',
  `groups_display_name` varchar(255) NOT NULL default '',
  `groups_description` text NOT NULL,
  `fk_type` int(10) NOT NULL default '0',
  PRIMARY KEY  (`groups_id`),
  KEY `agent_display_name` (`groups_display_name`),
  KEY `fk_type` (`fk_type`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Table structure for table `id`
#

CREATE TABLE `id` (
  `id_value` bigint(20) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id_value`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Table structure for table `j_groups_agent`
#

CREATE TABLE `j_groups_agent` (
  `fk_groups` int(10) NOT NULL default '0',
  `fk_agent` int(10) NOT NULL default '0',
  PRIMARY KEY  (`fk_agent`,`fk_groups`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Table structure for table `j_groups_groups`
#

CREATE TABLE `j_groups_groups` (
  `fk_parent` int(10) NOT NULL default '0',
  `fk_child` int(10) NOT NULL default '0',
  PRIMARY KEY  (`fk_parent`,`fk_child`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Table structure for table `type`
#

CREATE TABLE `type` (
  `type_id` int(10) NOT NULL auto_increment,
  `type_domain` varchar(255) NOT NULL default '',
  `type_authority` varchar(255) NOT NULL default '',
  `type_keyword` varchar(255) NOT NULL default '',
  `type_description` text,
  PRIMARY KEY  (`type_id`),
  KEY `domain` (`type_domain`),
  KEY `authority` (`type_authority`),
  KEY `keyword` (`type_keyword`)
) TYPE=MyISAM;
