namespace ArchiDox
{
    partial class LoginForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;
        private System.Windows.Forms.MainMenu LoginMenu;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(LoginForm));
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.pictureBox2 = new System.Windows.Forms.PictureBox();
            this.login = new System.Windows.Forms.TextBox();
            this.password = new System.Windows.Forms.TextBox();
            this.loginBtn = new System.Windows.Forms.Button();
            this.exitBtn = new System.Windows.Forms.Button();
            this.statusLabel = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // pictureBox1
            // 
            this.pictureBox1.BackColor = System.Drawing.Color.Transparent;
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(0, 0);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(480, 588);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            // 
            // pictureBox2
            // 
            this.pictureBox2.BackColor = System.Drawing.SystemColors.Control;
            this.pictureBox2.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox2.Image")));
            this.pictureBox2.Location = new System.Drawing.Point(78, 62);
            this.pictureBox2.Name = "pictureBox2";
            this.pictureBox2.Size = new System.Drawing.Size(324, 58);
            this.pictureBox2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            // 
            // login
            // 
            this.login.BackColor = System.Drawing.SystemColors.Control;
            this.login.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.login.ForeColor = System.Drawing.SystemColors.Menu;
            this.login.Location = new System.Drawing.Point(98, 254);
            this.login.Name = "login";
            this.login.Size = new System.Drawing.Size(284, 41);
            this.login.TabIndex = 2;
            this.login.Text = "Login";
            this.login.GotFocus += new System.EventHandler(this.clearLogin);
            // 
            // password
            // 
            this.password.BackColor = System.Drawing.SystemColors.Control;
            this.password.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.password.ForeColor = System.Drawing.SystemColors.Menu;
            this.password.Location = new System.Drawing.Point(98, 336);
            this.password.Name = "password";
            this.password.PasswordChar = '*';
            this.password.Size = new System.Drawing.Size(284, 41);
            this.password.TabIndex = 3;
            this.password.Text = "Hasło";
            this.password.GotFocus += new System.EventHandler(this.clearPass);
            // 
            // loginBtn
            // 
            this.loginBtn.Location = new System.Drawing.Point(168, 438);
            this.loginBtn.Name = "loginBtn";
            this.loginBtn.Size = new System.Drawing.Size(144, 40);
            this.loginBtn.TabIndex = 4;
            this.loginBtn.Text = "Zaloguj";
            this.loginBtn.Click += new System.EventHandler(this.checkLogin);
            // 
            // exitBtn
            // 
            this.exitBtn.Location = new System.Drawing.Point(168, 490);
            this.exitBtn.Name = "exitBtn";
            this.exitBtn.Size = new System.Drawing.Size(144, 40);
            this.exitBtn.TabIndex = 7;
            this.exitBtn.Text = "Wyjdź";
            this.exitBtn.Click += new System.EventHandler(this.exitApp);
            // 
            // statusLabel
            // 
            this.statusLabel.BackColor = System.Drawing.Color.Transparent;
            this.statusLabel.Location = new System.Drawing.Point(78, 166);
            this.statusLabel.Name = "statusLabel";
            this.statusLabel.Size = new System.Drawing.Size(324, 40);
            this.statusLabel.TextAlign = System.Drawing.ContentAlignment.TopCenter;
            this.statusLabel.Visible = false;
            // 
            // LoginForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(192F, 192F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Dpi;
            this.ClientSize = new System.Drawing.Size(480, 640);
            this.Controls.Add(this.statusLabel);
            this.Controls.Add(this.exitBtn);
            this.Controls.Add(this.loginBtn);
            this.Controls.Add(this.password);
            this.Controls.Add(this.login);
            this.Controls.Add(this.pictureBox2);
            this.Controls.Add(this.pictureBox1);
            this.KeyPreview = true;
            this.Location = new System.Drawing.Point(0, 0);
            this.Name = "LoginForm";
            this.Text = "ArchiDox for Windows";
            this.TopMost = true;
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.KeyDown += new System.Windows.Forms.KeyEventHandler(this.Form1_KeyDown);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.PictureBox pictureBox2;
        private System.Windows.Forms.TextBox login;
        private System.Windows.Forms.TextBox password;
        private System.Windows.Forms.Button loginBtn;
        private System.Windows.Forms.Button exitBtn;
        private System.Windows.Forms.Label statusLabel;
    }
}

