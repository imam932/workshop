# WRI POLINEMA

# Cek status
=> git status

# push project new
* 1. git add namafile / . (untuk all project)
* 2. git commit -m "status command"
* 3. git push -u [remote] [branch]

# pull request
* 1. git pull origin other-branch

=> jika sudah bekerja di satu branch untuk pull tidak akan menghilangkan data local
# issue (tips push dan pull project yang sudah terupdate di github)
= git add .
= git commit -m "pesan"
= git pull [remote] [branch]
= git push -u [remote] [branch]

# Menampilkan beberapa commit terakhir
= git log
(perintah ini akan menampilkan semua commit baik yang sudah dipush, maupun yang belum)
tekan q untuk exit

# Mengambil commit dari branch lain
= git cherry-pick "id_commit"

# Menghapus semua commit yang belum dipush
= git reset --hard origin/<branch_name>