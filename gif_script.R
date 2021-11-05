# ---------------------------
# Created on 2021-10-15
# @author: KenSein
# copyright (c) : Centre for Research and Development
# Contact: mohamad.nurrahmat@bmkg.go.id
# ---------------------------

rm(list = ls())

library(magick)
library(magrittr)
library(tidyverse)
library(lubridate)


# Cross Section -----------------------------------------------------------
Sys.Date()
latest_Data <- paste0(year(Sys.Date()),
                      month(Sys.Date()),
                      day(Sys.Date())-1)

list.files(path='./cross_section/', pattern = '*.png', full.names = TRUE) %>% 
  image_read() %>% # reads each path file
  image_join() %>% # joins image
  image_animate(fps=4) %>% # animates, can opt for number of loops
  image_write(paste0("./cross_section/cross_section_", latest_Data, ".gif")) # write to current dir
