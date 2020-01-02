using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using MySql.Data.MySqlClient;
using System.IO;

namespace WpfApplication2
{
    /// <summary>
    /// Interaction logic for ClienInfo.xaml
    /// </summary>
    public partial class ClienInfo : Window
    {
        Keys keys = new Keys();
        public ClienInfo()
        {
            InitializeComponent();
            textBox.Text = Convert.ToString(keys.result);
            

            string path = @"..\..\publicKey.txt";
            FileInfo fi1 = new FileInfo(path);
            // Открываем файл для чтения и читаем из него все строки, построчно
            using (StreamReader sr = fi1.OpenText())
            {
                string s = "";
                while ((s = sr.ReadLine()) != null)
                {
                    textBox.Text = s;
                }
            }
        }

        private void button2_Click(object sender, RoutedEventArgs e)
        {
            textBox4.Text = "";
            textBox5.Text = "студент";
            label4.Visibility = Visibility.Visible;
            textBox4.Visibility = Visibility.Visible;
            label5.Visibility = Visibility.Hidden;
            textBox5.Visibility = Visibility.Hidden;
        }

        private void button3_Click(object sender, RoutedEventArgs e)
        {
            textBox5.Text = "";
            textBox4.Text = "-";
            label4.Visibility = Visibility.Hidden;
            textBox4.Visibility = Visibility.Hidden;
            label5.Visibility = Visibility.Visible;
            textBox5.Visibility = Visibility.Visible;
        }

        private void button_Click(object sender, RoutedEventArgs e)
        {
            string connectionString = "datasource=127.0.0.1;port=3306;username=admin;password=admin;database=digitalsignature;";
            string query = "INSERT INTO digitalsignature(`OpenKey`, `Surname`, `Name`, `FatherName`, `Post`, `Book`) VALUES ('" + textBox.Text + "', '" + textBox1.Text + "', '" + textBox2.Text + "', '" + textBox3.Text + "', '" + textBox5.Text + "', '" + textBox4.Text + "')";

            MySqlConnection databaseConnection = new MySqlConnection(connectionString);
            MySqlCommand commandDatabase = new MySqlCommand(query, databaseConnection);
            commandDatabase.CommandTimeout = 60;

            try
            {
                databaseConnection.Open();
                MySqlDataReader myReader = commandDatabase.ExecuteReader();

                MessageBox.Show("Власника підпису додано");

                databaseConnection.Close();
                this.Close();
            }
            catch (Exception ex)
            {
                // Show any error message.
                MessageBox.Show(ex.Message);
            }
        }
        
        private void button1_Click(object sender, RoutedEventArgs e)
        {
            this.Close();
        }
    }
}
