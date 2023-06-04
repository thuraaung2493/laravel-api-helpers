#!/bin/bash

echo -e "Preparing for Git pushing ..."
echo -e "------------------\n"

composer prepare

echo -e "Git status =>"
git status
echo -e "-------------------\n"

echo -e "Do you want to commit it? (y/n)"
read -p "Answer: " reply

if [[ $reply =~ ^[Yy]$ ]]
then
  echo -e "Do you want to add all files? (y/n)"
  read -p "Answer: " add
  if [[ $add =~ ^[Yy]$ ]]
  then
    git add .
    echo -e "What is commit message?"
    read -p "Message: " message
    git commit -m "$message"
  fi
fi