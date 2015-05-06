using System;
using System.Linq;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.Resources;
using System.Net;
using System.IO;
using Newtonsoft.Json;
using Newtonsoft.Json.Converters;
using Newtonsoft.Json.Linq;
using System.Collections.Specialized;

namespace ArchiDox
{

    

    public partial class LoginForm : Form
    {

        private DateTime appStart;
        private string fn;
        private string app_path;
        private TextWriter errStream;
        

        public LoginForm()
        {
            this.appStart = DateTime.Now;
            this.app_path = System.IO.Path.GetDirectoryName(System.Reflection.Assembly.GetExecutingAssembly().GetName().CodeBase);
            this.fn = app_path + @"\logs\error_log-" + appStart.ToString("yyyyMMdd") + ".log";
            this.errStream = new StreamWriter(fn,true);

           

            InitializeComponent();

  
        }

        private string SendData(string method, string url, string data)
        {
            string host = ArchiDox.Properties.Resources.archidoxHOST;
            string full_url = @"http://" + host + url;
            Console.SetError(this.errStream);
            Console.Error.WriteLine("Send data started");
            Console.Error.WriteLine("Params: "+full_url);

            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(full_url);
            
            request.KeepAlive = false;
            request.Method = method;

            request.Credentials = CredentialCache.DefaultCredentials;
            // turn our request string into a byte stream
            byte[] postBytes;

            if (data != null)
            {
                postBytes = Encoding.UTF8.GetBytes(data);
            }
            else
            {
                postBytes = new byte[0];
            }

            Console.Error.WriteLine(postBytes.Length);

            request.ContentType = "application/x-www-form-urlencoded";
            request.ContentLength = postBytes.Length;

            Stream requestStream = request.GetRequestStream();

            // now send it
            requestStream.Write(postBytes, 0, postBytes.Length);
            requestStream.Close();

            HttpWebResponse response;

            response = (HttpWebResponse)request.GetResponse();

            Stream dataStream = response.GetResponseStream();

            StreamReader reader = new StreamReader(dataStream);
            // Read the content.
            string responseFromServer = reader.ReadToEnd();
          
            // Clean up the streams and the response.
            reader.Close();
            response.Close();
            Console.Error.Flush();
            return responseFromServer;
        }

        private void Form1_KeyDown(object sender, KeyEventArgs e)
        {
            if ((e.KeyCode == System.Windows.Forms.Keys.Up))
            {
                // Up
            }
            if ((e.KeyCode == System.Windows.Forms.Keys.Down))
            {
                // Down
            }
            if ((e.KeyCode == System.Windows.Forms.Keys.Left))
            {
                // Left
            }
            if ((e.KeyCode == System.Windows.Forms.Keys.Right))
            {
                // Right
            }
            if ((e.KeyCode == System.Windows.Forms.Keys.Enter))
            {
                // Enter
            }

        }

        private void checkLogin(object sender, EventArgs e)
        {

            Console.SetError(this.errStream);
            string user = this.login.Text;
            string password = this.password.Text;
            string url = ArchiDox.Properties.Resources.loginURL;

            Dictionary<string, string> json = new Dictionary<string, string>();

            json.Add("user", user);
            json.Add("password", password);
            string jsonContent = JsonConvert.SerializeObject(json);
            string postData = "";

            foreach (string key in json.Keys)
            {
                postData += key + "="
                      + json[key] + "&";
            }

            statusLabel.Visible = false;
            Console.Error.WriteLine("checkLogin started");
            Console.Error.WriteLine(postData);
            
            try
            {
                string result = this.SendData("POST",url,postData);
                Console.Error.WriteLine(result);

                if (result.Length > 0)
                {
                    try
                    {
                        JsonResponseResult responseObj = JsonConvert.DeserializeObject<JsonResponseResult>(result);
                        Console.Error.WriteLine(responseObj.ToString());

                        if ( responseObj.status == "OK")
                        {
                            
                            Console.Error.WriteLine("Login Success: "+user);
                            Console.Error.Flush();
                            Console.Error.Close();
                            this.errStream.Close();
                            Form sf = new SearchForm();
                            sf.Show();
                            this.Hide();
                        }
                        else
                        {
                            statusLabel.Visible = true;
                            statusLabel.Text = "Logowanie nie powiodło się! ";
                            Console.Error.WriteLine("Login Error: " + user);
                            Console.Error.WriteLine(responseObj.content);
                            Console.Error.Flush();
                        }
                    }
                    catch (Exception ex)
                    {
                        string message = ex.Message;
                        statusLabel.Visible = true;
                        statusLabel.Text = "Logowanie nie powiodło się! ";
                        Console.Error.WriteLine(message);
                        Console.Error.Flush();
                    }
                }
                else
                {
                    statusLabel.Visible = true;
                    statusLabel.Text = "Brak odpowiedzi serwera!";
                }
            }
            catch (WebException ex)
            {
                // Log exception and throw as for GET example above
                string message = ex.Message;
                statusLabel.Visible = true;
                statusLabel.Text= "Logowanie nie powiodło się! ";
                Console.Error.WriteLine(message);
                Console.Error.Flush();
                //throw;
            }

            
        }

        private void exitApp(object sender, EventArgs e)
        {
            Console.Error.Close();
            Application.Exit();
        }

        private void clearLogin(object sender, EventArgs e)
        {
            this.login.Text = "";
        }

        private void clearPass(object sender, EventArgs e)
        {
            this.password.Text = "";
        }
    }
}